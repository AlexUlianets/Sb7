<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\WebmasterSection;
use App\SeoSettings;
use Auth;

class SeoSettingsController extends Controller
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
     * Index page for SEO Settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$SeoSettings = SeoSettings::find(1);

    	return view( 'backEnd.settings.seo', compact( "GeneralWebmasterSections", "SeoSettings" ) );
    }

    /**
     * Update function for SEO Settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    	$SeoSettings = SeoSettings::find(1);
    	$SeoSettings->show_name_after = $request->show_name_after;
    	$SeoSettings->enable_breadcumbs = $request->enable_breadcumbs;
    	$SeoSettings->between_breadcumbs = $request->between_breadcumbs;
    	$SeoSettings->anchor_for_homepage = $request->anchor_for_homepage;
    	$SeoSettings->prefix_list_category = $request->prefix_list_category;
    	$SeoSettings->prefix_search_page = $request->prefix_search_page;
    	$SeoSettings->breadcumb_for_404 = $request->breadcumb_for_404;
    	$SeoSettings->bold_last_page = $request->bold_last_page;
    	$SeoSettings->google_webmaster_tools = $request->google_webmaster_tools;
    	$SeoSettings->bing_webmaster_tools = $request->bing_webmaster_tools;
    	$SeoSettings->pinterest_webmaster_tools = $request->pinterest_webmaster_tools;
    	$SeoSettings->seo_title = $request->seo_title;
    	$SeoSettings->seo_description = $request->seo_description;
    	$SeoSettings->seo_keywords = $request->seo_keywords;
    	$SeoSettings->list_title_as_meta_title = $request->list_title_as_meta_title;
    	$SeoSettings->list_description_as_meta_description = $request->list_description_as_meta_description;
    	$SeoSettings->update();

    	return redirect()->action( 'SeoSettingsController@index' );

    }
}
