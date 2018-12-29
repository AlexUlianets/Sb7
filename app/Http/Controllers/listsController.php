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

class listsController extends Controller
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

        $data = \DB::table('custom_settings')->get()->first()->lists;
        $data = json_decode($data);
        // dd(json_decode($data));

        return view("backEnd.lists", compact("Users", "Permissions", "GeneralWebmasterSections", "data"));
    }


    public function store(Request $request)
    {

        $data = $request->all();
        // array_shift($data);
        $data= json_encode($data,true);
        // dd($data);

        $edited_character = \DB::table('custom_settings')->where('id', 1)->update([
            'lists' => $data
            //others property
        ]);

        // Check Permissions
        // if (!@Auth::user()->permissionsGroup->add_status) {
        //     return Redirect::to(route('NoPermission'))->send();
        // }

        //
        // $this->validate($request, [
        //     'email' => 'email|required',
        //     'file' => 'mimes:png,jpeg,jpg,gif|max:3000'
        // ]);


        // // Start of Upload Files
        // $formFileName = "file";
        // $fileFinalName_ar = "";
        // if ($request->$formFileName != "") {
        //     $fileFinalName_ar = time() . rand(1111,
        //             9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
        //     $path = $this->getUploadPath();
        //     $request->file($formFileName)->move($path, $fileFinalName_ar);
        // }
        // // End of Upload Files

        // $Contact = new Contact;
        // $Contact->group_id = $request->group_id;
        // $Contact->first_name = $request->first_name;
        // $Contact->last_name = $request->last_name;
        // $Contact->company = $request->company;
        // $Contact->email = $request->email;
        // $Contact->password = $request->password;
        // $Contact->phone = $request->phone;
        // $Contact->country_id = $request->country_id;
        // $Contact->city = $request->city;
        // $Contact->address = $request->address;
        // $Contact->address = $request->address;
        // $Contact->photo = $fileFinalName_ar;
        // $Contact->notes = $request->notes;
        // $Contact->status = 1;
        // $Contact->created_by = Auth::user()->id;
        // $Contact->save();
        
        return redirect()->action('listsController@index')->with('doneMessage', trans('backLang.saveDone'));
    }

}