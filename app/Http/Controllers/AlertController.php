<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AlertSettings;
use App\WebmasterSection;
use Auth;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->banners_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Index of Alert Settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$AlertSettings = AlertSettings::find(1);

    	return view( 'backEnd.settings.alert', compact( "GeneralWebmasterSections", 'AlertSettings' ) );
    }

    /**
     * Update of alert settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Reponse
     */
    public function update(Request $request)
    {
    	$AlertSettings = AlertSettings::find(1);
    	$AlertSettings->create_welcome_email = $request->create_welcome_email;
    	$AlertSettings->create_welcome_notification = $request->create_welcome_notification;
    	$AlertSettings->order_email = $request->order_email;
    	$AlertSettings->order_notification = $request->order_notification;
    	$AlertSettings->order_status_email = $request->order_status_email;
    	$AlertSettings->order_status_notification = $request->order_status_notification;
    	$AlertSettings->new_list_email = $request->new_list_email;
    	$AlertSettings->new_list_notification = $request->new_list_notification;
    	$AlertSettings->forgot_password_email = $request->forgot_password_email;
    	$AlertSettings->forgot_password_notification = $request->forgot_password_notification;
    	$AlertSettings->add_new_list_email = $request->add_new_list_email;
    	$AlertSettings->add_new_list_notification = $request->add_new_list_notification;
    	$AlertSettings->update();

    	return redirect()->action( 'AlertController@index' );
    }
}
