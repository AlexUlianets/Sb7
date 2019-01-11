<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\LanguageSettings;
use App\WebmasterSection;
use Auth;

class LanguageSettingsController extends Controller
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
     * Index of Language Settings
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	if (@Auth::user()->permissionsGroup->view_status) {
    		$Languages = LanguageSettings::all();

    		$LanguagesCount = LanguageSettings::count();
    	} else {
    		$Languages = LanguageSettings::all();

    		$LanguagesCount = LanguageSettings::count();
    	}

    	return view( "backEnd.settings.language", compact( "GeneralWebmasterSections", "Languages", "LanguagesCount" ) );
    }

    /**
     * Index page of adding language to settings
     *
     * @return Illuminate\Http\Response
     */
    public function indexAdd()
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	return view( "backEnd.settings.languageAdd", compact( "GeneralWebmasterSections" ) );
    }

    /**
     * Index page of languages settings
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function indexUpdate( $id )
    {
    	$GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

    	$LanguageToEdit = LanguageSettings::find( $id );

    	return view( "backEnd.settings.languageAdd", compact( "GeneralWebmasterSections", "LanguageToEdit" ) );
    }

    /**
     * Store language in settings
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$Language = new LanguageSettings();
    	$Language->name = $request->name;
    	$Language->code = $request->code;
    	$Language->direction = $request->direction;
    	$Language->icon = $request->icon;
    	$Language->directory = $request->directory;
    	$Language->default = $request->default;
    	$Language->save();

    	return redirect()->action( 'LanguageSettingsController@index' );
    }

    /**
     * Update language in settins
     *
     * @param Illuminate\Http\Request $request
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$Language = LanguageSettings::find( $id );
    	$Language->name = $request->name;
    	$Language->code = $request->code;
    	$Language->direction = $request->direction;
    	$Language->icon = $request->icon;
    	$Language->directory = $request->directory;
    	$Language->default = $request->default;
    	$Language->update();

    	return redirect()->action( 'LanguageSettingsController@index' );
    }

    /**
     * Destroy language in languages settings
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function destroy( $id )
    {
    	$Language = LanguageSettings::find( $id );
    	$Language->delete();

    	return redirect()->action( 'LanguageSettingsController@index' );
    }
}
