<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoriesGroup;
use App\Country;
use App\Http\Requests;
use App\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;

class SearchController extends Controller
{
	private $uploadPath = "uploads/Categories/";

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->newsletter_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * AJAX search in form
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    	if ( $request->ajax() )
    	{
    		$output = "";
    		$search_word = "";

    		$Categories = Category::where('created_by', '=', Auth::user()->id)->where('first_name', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q )
                    ->orwhere('email', '=', $request->q )
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));

            if ( $Categories )
            {
            	foreach ( $Categories as $key => $Category ) {
            		$output .= '<tr>' .
            		'<td>' . $Category->id . '</td>' .
            		'<td>' . $Category->first_name . '</td>' .
            		'</tr>';
            	}

            	return Response( $output );
            }
    	}
    }
}
