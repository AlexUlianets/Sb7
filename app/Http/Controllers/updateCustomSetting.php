<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Setting;
use App\WebmasterSection;
use Auth;
use File;
use Illuminate\Http\Request;
use Redirect;

class updateCustomSettingController extends Controller
{
    // Define Default updateCustomSetting ID
    private $id = 1;
    private $uploadPath = "uploads/updateCustomSetting/";

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    public function edit()
    {
        // //

        // // General for all pages
        // $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // // General END

        // $id = $this->getId();
        // $Setting = Setting::find($id);
        // if (!empty($Setting)) {
        //     return view("backEnd.updateCustomSetting.updateCustomSetting", compact("Setting", "GeneralWebmasterSections"));

        // } else {
            return redirect()->route('adminHome');
        // }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id = 1 for default updateCustomSetting
     * @return \Illuminate\Http\Response
     */
    public function updateSiteInfo(Request $request)
    {
            
            
            
            return redirect()->action('updateCustomSettingController@edit')
                ->with('doneMessage', 'Modifications you have made saved successfully');
            // ->with('doneMessage', trans('backLang.saveDone'))
        // } else {
        //     return redirect()->route('adminHome');
        // }
    }



    // update tab of site status

    public function getUploadPath()
    {
        return $this->uploadPath;
    }


    // update tab of Style updateCustomSetting

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}
