<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmailSettings;
use App\WebmasterSection;
use Auth;

class EmailSettingsController extends Controller
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
     * Index of email settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$EmailSettings = EmailSettings::find(1);

    	return view( 'backEnd.settings.email', compact( "GeneralWebmasterSections", "EmailSettings" ) );
    }

    /**
     * Update of email settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$EmailSettings = EmailSettings::find(1);
    	$EmailSettings->inquery_email = $request->inquery_email;
    	$EmailSettings->order_email = $request->order_email;
    	$EmailSettings->email_template = $request->email_template;
    	$EmailSettings->update();

    	return redirect()->action( 'EmailSettingsController@index' );
    }
}
