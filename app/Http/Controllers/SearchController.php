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
use Redirect;;
use DB;

class SearchController extends Controller
{

    /**
     * AJAX search in categories input
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {
    	if ( $request->ajax() )
    	{
			$output = "";

			return Response( var_dump( "Hello world" ) );

		}
    }

}
