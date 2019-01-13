<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GoogleAnalyticsSettings;
use App\WebmasterSection;
use Auth;

class GoogleAnalyticsController extends Controller
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
     * Index of Google Analytics Settings
     *
     * @return Illuminate\Http\Response
     */
    public function indexSettings()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$GoogleAnalyticsSettings = GoogleAnalyticsSettings::find(1);

    	return view( "backEnd.settings.google_analytics", compact( "GoogleAnalyticsSettings", "GeneralWebmasterSections" ) );
    }

    /**
     * Update google analytics settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
    	$GoogleAnalyticsSettings = GoogleAnalyticsSettings::find(1);
    	$GoogleAnalyticsSettings->tracking_code = $request->tracking_code;
    	$GoogleAnalyticsSettings->view_id = $request->view_id;
    	$GoogleAnalyticsSettings->update();

    	return redirect()->action( "GoogleAnalyticsController@indexSettings" );
    }
}
