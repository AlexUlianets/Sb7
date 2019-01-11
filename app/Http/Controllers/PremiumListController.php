<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\PremiumListSettings;
use App\Http\Controllers\Controller;
use App\WebmasterSection;
use App\Topic;
use App\User;
use App\PremiumListPages;
use Auth;

class PremiumListController extends Controller
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
     * Settings page of premium list
     *
     * @param Illuminate\Http\Request $webmasterId
     * @return Illuminate\Http\Response
     */
    public function index( $webmasterId )
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
    	$WebmasterSection = WebmasterSection::find($webmasterId);

    	if ( @Auth::user()->permissionsGroup->view_status ) {
    		$Topics = Topic::where('created_by', '=', Auth::user()->id)->where('webmaster_id', '=',
                    $webmasterId)->orderby('row_no',
                    'asc')->paginate(env('BACKEND_PAGINATION'));

            $ListSettings = PremiumListSettings::all();
            $ListPages = PremiumListPages::all();

            $TotalSettings = PremiumListSettings::count();

            if ( $TotalSettings > 0 ) {

            	$SettingToEdit = $ListSettings;

            	return view("backEnd.listsPremium.listsPremium", compact("GeneralWebmasterSections", "Topics", "ListSettings", "TotalSettings", "SettingToEdit", "ListPages"));
            }

            return view("backEnd.listsPremium.listsPremium", compact("GeneralWebmasterSections", "Topics", "ListSettings", "TotalSettings", "WebmasterSection"));
    	} else {
    		$Topics = Topic::where('created_by', '=', Auth::user()->id)->where('webmaster_id', '=',
                    $webmasterId)->orderby('row_no',
                    'asc')->paginate(env('BACKEND_PAGINATION'));

            $ListSettings = PremiumListSettings::all();

            $TotalSettings = PremiumListSettings::count();
            $ListPages = PremiumListPages::all();

            if ( $TotalSettings > 0 ) {

            	$SettingToEdit = $ListSettings;

            	return view("backEnd.listsPremium.listsPremium", compact("GeneralWebmasterSections", "Topics", "ListSettings", "TotalSettings", "SettingToEdit", "WebmasterSection", "ListPages"));
            }

    		return view("backEnd.listsPremium.listsPremium",
            compact("GeneralWebmasterSections", "WebmasterSection", "Topics", "ListSettings", "TotalSettings", "ListPages"));
    	}
    }

    /**
     * Save settings of premium list
     *
     * @param Illuminate\Http\Request $request
     * @param int @webmasterId
     * @return Illuminate\Http\Response
     */
    public function store(Request $request, $webmasterId)
    {	
    	$WebmasterSection = WebmasterSection::find($webmasterId);
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$Topics = Topic::where('created_by', '=', Auth::user()->id)->where('webmaster_id', '=',
                    $webmasterId)->orderby('row_no',
                    'asc')->paginate(env('BACKEND_PAGINATION'));

    	$ListSettings = new PremiumListSettings();
    	$ListSettings->days = $request->days;
    	$ListSettings->impressions = $request->impression;
    	$ListSettings->price = $request->price;
    	$ListSettings->save();

    	return redirect()->route('premiumListSettings', ['webmasterId' => $webmasterId])->with("Topics");

    }

    /**
     * Update settings of premium list
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $webmasterId)
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
    	$WebmasterSection = WebmasterSection::find($webmasterId);

    	$PremiumList = PremiumListSettings::find(1);
    	$PremiumList->days = $request->days;
    	$PremiumList->impressions = $request->impression;
    	$PremiumList->price = $request->price;
    	$PremiumList->update();

    	return redirect()->route('premiumListSettings', ['webmasterId' => $webmasterId]);
    }

    /**
     * Save pages in table
     *
     * @param Illuminate\Http\Request $request
     * @param int $webmasterId
     * @return Illuminate\Http\Response
     */
    public function savePage(Request $request, $webmasterId)
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
    	$WebmasterSection = WebmasterSection::find($webmasterId);

    	$PremiumListPages = new PremiumListPages();
    	$PremiumListPages->title = $request->page;
    	$PremiumListPages->save();

    	$Topics = Topic::where('created_by', '=', Auth::user()->id)->where('webmaster_id', '=',
                    $webmasterId)->orderby('row_no',
                    'asc')->paginate(env('BACKEND_PAGINATION'));

    	return redirect()->action('PremiumListController@index', [$webmasterId])->with( compact( "Topics" ) );
    }

    /**
     * Delete page in page list
     *
     * @param Illuminate\Http\Request $request
     * @param int $id
     * @param int $webmasterId
     * @return Illuminate\Http\Response
     */
    public function deletePage(Request $request, $webmasterId, $id)
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
    	$WebmasterSection = WebmasterSection::find($webmasterId);

    	$Page = PremiumListPages::find( $id );

    	$Topics = Topic::where('created_by', '=', Auth::user()->id)->where('webmaster_id', '=',
                    $webmasterId)->orderby('row_no',
                    'asc')->paginate(env('BACKEND_PAGINATION'));

    	if ( $Page ) {
    		$Page->delete();
    	}

    	return redirect()->action('PremiumListController@index', [$webmasterId])->with( compact( "Topics" ) );
    }
}
