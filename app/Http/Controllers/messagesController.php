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
}