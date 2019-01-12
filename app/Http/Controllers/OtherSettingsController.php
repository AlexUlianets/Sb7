<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebmasterSection;
use App\OtherSettings;
use Auth;

class OtherSettingsController extends Controller
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
     * Index of other settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$OtherSettings = OtherSettings::find(1);

    	return view( 'backEnd.settings.other', compact( "GeneralWebmasterSections", "OtherSettings" ) );
    }

    /**
     * Update other settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$OtherSettings = OtherSettings::find(1);
    	$OtherSettings->gzip_compression = $request->gzip_compression;
    	$OtherSettings->enable_captcha = $request->enable_captcha;
    	$OtherSettings->captcha_site_key = $request->captcha_site_key;
    	$OtherSettings->captcha_secret = $request->captcha_secret;
    	$OtherSettings->captcha_on_signup = $request->captcha_on_signup;
    	$OtherSettings->captcha_on_list = $request->captcha_on_list;
    	$OtherSettings->captcha_on_login = $request->captcha_on_login;
    	$OtherSettings->captcha_on_forget = $request->captcha_on_forget;
    	$OtherSettings->before_head_css = $request->before_head_css;
    	$OtherSettings->end_body_tag_css = $request->end_body_tag_css;
    	$OtherSettings->cookie_message = $request->cookie_message;
    	$OtherSettings->cookie_bar_position = $request->cookie_bar_position;
    	$OtherSettings->cookie_bar_color = $request->cookie_bar_color;
    	$OtherSettings->cookie_text_color = $request->cookie_text_color;
    	$OtherSettings->cookie_show_border = $request->cookie_show_border;
    	$OtherSettings->cookie_border_color = $request->cookie_border_color;
    	$OtherSettings->font_global = $request->font_global;
    	$OtherSettings->font_global_style = $request->font_global_style;
    	$OtherSettings->characters_sets = $request->characters_sets;
    	$OtherSettings->h1_font_family = $request->h1_font_family;
    	$OtherSettings->h1_size = $request->h1_size;
    	$OtherSettings->h1_style = $request->h1_style;
    	$OtherSettings->h2_font_family = $request->h2_font_family;
    	$OtherSettings->h2_size = $request->h2_size;
    	$OtherSettings->h2_style = $request->h2_style;
    	$OtherSettings->h3_font_family = $request->h3_font_family;
    	$OtherSettings->h3_size = $request->h3_size;
    	$OtherSettings->h3_style = $request->h3_style;
    	$OtherSettings->body_font_family = $request->body_font_family;
    	$OtherSettings->body_size = $request->body_size;
    	$OtherSettings->body_style = $request->body_style;
    	$OtherSettings->meta_info_font_family = $request->meta_info_font_family;
    	$OtherSettings->meta_info_size = $request->meta_info_size;
    	$OtherSettings->meta_info_style = $request->meta_info_style;
    	$OtherSettings->footer_font_family = $request->footer_font_family;
    	$OtherSettings->footer_size = $request->footer_size;
    	$OtherSettings->footer_style = $request->footer_style;
    	$OtherSettings->menu_font_family = $request->menu_font_family;
    	$OtherSettings->menu_size = $request->menu_size;
    	$OtherSettings->menu_style = $request->menu_style;
    	$OtherSettings->update();

    	return redirect()->action( 'OtherSettingsController@index' );
    }
}
