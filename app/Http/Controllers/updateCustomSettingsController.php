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

class updateCustomSettingsController extends Controller
{


    public function store(Request $request)
    {
        // dd($request->redirectTo);

        $data = $request->all();
        // array_shift($data);
        $data= json_encode($data,true);
        // dd($data);

        $edited_character = \DB::table('custom_settings')->where('id', 1)->update([
            $request->redirectTo => $data
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
        return redirect()->action($request->redirectTo.'Controller@index')->with('doneMessage', trans('backLang.saveDone'));
    }

}