<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebmasterSection;
use App\SubscriptionSettings;
use Auth;

class SubscriptionController extends Controller
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
     * 	Index of subscription settings
     *
     * @return Illuminate\Http\Response
     */
    public function indexSettings()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$SubscriptionSettings = SubscriptionSettings::find(1);

    	return view( "backEnd.settings.subscription", compact( "GeneralWebmasterSections", "SubscriptionSettings" ) );	
    }

    /**
     * Update subscription settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
    	$SubscriptionSettings = SubscriptionSettings::find(1);
    	$SubscriptionSettings->enable_subscription = $request->enable_subscription;
    	$SubscriptionSettings->service_provide = $request->service_provide;
    	$SubscriptionSettings->default_checkbox = $request->default_checkbox;
    	$SubscriptionSettings->checkbox_label = $request->checkbox_label;
    	$SubscriptionSettings->confirmation_label = $request->confirmation_label;
    	$SubscriptionSettings->api_key = $request->api_key;
    	$SubscriptionSettings->api_url = $request->api_url;
    	$SubscriptionSettings->update();

    	return redirect()->action( 'SubscriptionController@indexSettings' );
    }
}
