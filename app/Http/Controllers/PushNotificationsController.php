<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PushNotifications;
use App\WebmasterSection;
use Auth;

class PushNotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->inbox_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Index of Push notifications settings
     *
     * @return Illuminate\Http\Response
     */
    public function indexSettings()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$PushNotifications = PushNotifications::find(1);

    	return view( 'backEnd.settings.push_notifications', compact( "GeneralWebmasterSections", "PushNotifications" ) );
    }

    /**
     * Update push notifications settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
    	$PushNotifications = PushNotifications::find(1);
    	$PushNotifications->default_notification = $request->default_notification;
    	$PushNotifications->app_id = $request->app_id;
    	$PushNotifications->sender_id = $request->sender_id;
    	$PushNotifications->update();

    	return redirect()->action('PushNotificationsController@indexSettings');
    }
}
