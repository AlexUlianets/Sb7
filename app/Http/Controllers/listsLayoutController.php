<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\Permissions;
use App\User;
use App\WebmasterSection;
use Illuminate\Http\Request;
use Redirect;
use File;

class listsLayoutController extends Controller
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
        }

        $data = \DB::table('custom_settings')->get()->first()->listsLayout;
        $data = json_decode($data);
        return view("backEnd.listsLayout.listsLayout", compact("Users", "Permissions", "GeneralWebmasterSections", "data"));
    }



}