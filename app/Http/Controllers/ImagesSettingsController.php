<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\WebmasterSection;
use App\ImagesSettings;
use Auth;

class ImagesSettingsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Index of images settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$ImagesSettings = ImagesSettings::find(1);

    	return view( 'backEnd.settings.images', compact( "GeneralWebmasterSections", "ImagesSettings" ) );
    }

    /**
     * Update images settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$ImagesSettings = ImagesSettings::find(1);

    	$ImagesSettings->api_key = $request->api_key;
    	$ImagesSettings->compress_bg = $request->compress_bg;
    	$ImagesSettings->compress_upload = $request->compress_upload;
    	$ImagesSettings->not_compress_auto = $request->not_compress_auto;
    	$ImagesSettings->sizes_compress = $request->sizes_compress;
    	$ImagesSettings->update();

    	return redirect()->action( 'ImagesSettingsController@index' );
    }
}
