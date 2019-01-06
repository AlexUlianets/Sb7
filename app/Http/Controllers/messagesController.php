<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\Permissions;
use App\User;
use App\WebmasterSection;
use App\ContactMessages;
use Illuminate\Http\Request;
use Redirect;
use File;
use Illuminate\Config;

class messagesController extends Controller
{


    public function index()
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $Users = User::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->orderby('id',
                'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $Users = User::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();

            $ContactMessages = ContactMessages::all();
        }

        if ( $ContactMessages ) {
            return view("backEnd.messages.messages", compact("Users", "ContactMessages", "Permissions", "GeneralWebmasterSections"));
        }

        return view("backEnd.messages.messages", compact("Users", "Permissions", "GeneralWebmasterSections"));
    }


    /**
     * This function delete contact message
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $ContactMessage = ContactMessages::find($id);
        } else {
            $ContactMessage = ContactMessages::find($id);
        }
        if (!empty($ContactMessage)) {

            $ContactMessage->delete();
        }
        return redirect()->action('messagesController@index');
    }

    /**
     * Search in database table by query
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($request->q != "") {
                //find Contacts
                $ContactMessages = ContactMessages::where('email', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('phone', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all contacts
                $ContactMessages = ContactMessages::latest('id')->paginate(env('BACKEND_PAGINATION'));
            }
        } else {
            if ($request->q != "") {
                //find Contacts
                $ContactMessages = ContactMessages::where('email', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('phone', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all contacts
                $ContactMessages = ContactMessages::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        }

        // $search_word = $request->q;

        return view("backEnd.messages.messages", compact("ContactMessages", "GeneralWebmasterSections", "search_word"));
    }

    /**
     * Show X entries of contact messages
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function showEntries(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $Permissions = Permissions::orderby('id', 'asc')->get();

        $show_entries = $request->input('show_entries');

        $ContactMessages = ContactMessages::latest('id')->paginate( $show_entries );

        if ( $ContactMessages ) {
            return view("backEnd.messages.messages", compact( "ContactMessages", "Permissions", "GeneralWebmasterSections"));
        }
    }
}