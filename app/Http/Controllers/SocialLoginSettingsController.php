<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\SocialLoginSettings;
use App\WebmasterSection;
use Auth;

class SocialLoginSettingsController extends Controller
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
     * Index of social login settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$SocialLoginSettings = SocialLoginSettings::find(1);

    	return view( 'backEnd.settings.social_login', compact( "GeneralWebmasterSections", "SocialLoginSettings" ) );
    }

    /**
     * Update settings of social settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update( Request $request )
    {

    	$SocialLoginSettings = SocialLoginSettings::find(1);
    	$SocialLoginSettings->all_settings = $request->all_settings;
    	$SocialLoginSettings->facebook = $request->facebook;
    	$SocialLoginSettings->facebook_id = $request->facebook_id;
    	$SocialLoginSettings->facebook_secret = $request->facebook_secret;
    	$SocialLoginSettings->google = $request->google;
    	$SocialLoginSettings->google_id = $request->google_id;
    	$SocialLoginSettings->google_secret = $request->google_secret;
    	$SocialLoginSettings->twitter = $request->twitter;
    	$SocialLoginSettings->twitter_id = $request->twitter_id;
    	$SocialLoginSettings->twitter_secret = $request->twitter_secret;
    	$SocialLoginSettings->update();

    	return redirect()->action( 'SocialLoginSettingsController@index' );

    }
}
