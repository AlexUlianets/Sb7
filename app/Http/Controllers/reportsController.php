<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\Permissions;
use App\User;
use App\WebmasterSection;
use App\Reports;
use Illuminate\Http\Request;
use Redirect;
use File;

class reportsController extends Controller
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

            $Reports = Reports::all();
        } else {
            $Users = User::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();

            $Reports = Reports::all();
        }
        return view("backEnd.reports.reports", compact("Users", "Permissions", "GeneralWebmasterSections", "Reports"));
    }

    /**
     * View the report
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function view( $id )
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $Users = User::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->orderby('id',
                'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();

            $Report = Reports::find($id);
        } else {
            $Users = User::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->orderby('id',
                'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();

            $Report = Reports::find($id);
        }
        return view("backEnd.reports.show", compact("Users", "Permissions", "GeneralWebmasterSections", "Report"));
    }

    /**
     * This function deleting a selected report
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        $Report = Reports::find( $id );
        $Report->delete();

        return redirect()->action( 'reportsController@index' );
    }

    /**
     *
     *
     * 
     *
     */
    public function store( Request $request )
    {

    }


    /**
     * Show entries of objects in reports page
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function showEntries(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        $show_entries = $request->show_entries;

        $Reports = Reports::latest('id')->paginate( $show_entries );

        return view("backEnd.reports.reports", compact("GeneralWebmasterSections", "Reports"));
    }

    /**
     * Search function
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function reportsSearch(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($request->q != "") {
                //find Categories
                $Reports = Reports::where('email', 'like',
                    '%' . $request->q . '%')
                    ->orWhere('reason', 'like', '%' . $request->q . '%' )
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all Categories
                $Reports = Reports::latest('id')->paginate(env('BACKEND_PAGINATION'));
            }
        } else {
            if ($request->q != "") {
                //find Categories
                $Reports = Reports::where('email', 'like',
                    '%' . $request->q . '%')
                    ->orWhere('reason', 'like', '%' . $request->q . '%' )
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all Categories
                $Reports = Reports::latest('id')->paginate(env('BACKEND_PAGINATION'));
            }
        }

        return view("backEnd.reports.reports", compact("GeneralWebmasterSections", "Reports"));
    }
}