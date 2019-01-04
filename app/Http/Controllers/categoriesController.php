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

class categoriesController extends Controller
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
     * Display a listing of the resource.
     * int $group_id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroups = CategoriesGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CategoriesGroups = CategoriesGroup::orderby('id', 'asc')->get();
        }
        //List of Countries
        $Countries = Country::orderby('title_' . trans('backLang.boxCode'), 'asc')->get(); 

        // if (@Auth::user()->permissionsGroup->view_status) {
        //     if ($group_id > 0) {
        //         //List of group Categories
        //         $Categories = Category::where('created_by', '=', Auth::user()->id)->where('group_id', '=',
        //             $group_id)->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } elseif ($group_id == "wait") {
        //         //List waiting activation Categories
        //         $Categories = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
        //             '0')->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } elseif ($group_id == "blocked") {
        //         //List waiting activation Categories
        //         $Categories = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
        //             '2')->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } else {
        //         //List of all Categories
        $Categories = Category::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
        //     }
        // } else {
        //     if ($group_id > 0) {
        //         //List of group Categories
        //         $Categories = Category::where('group_id', '=', $group_id)->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } elseif ($group_id == "wait") {
        //         //List waiting activation Categories
        //         $Categories = Category::where('status', '=', '0')->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } elseif ($group_id == "blocked") {
        //         //List waiting activation Categories
        //         $Categories = Category::where('status', '=', '2')->orderby('id',
        //             'desc')->paginate(env('BACKEND_PAGINATION'));
        //     } else {
        //         //List of all Categories
        //         $Categories = Category::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
        //     }
        // }

        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Categories
            // $WaitCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '0')->count();

            //Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Categories
            // $WaitCategoriesCount = Category::where('status', '=', '0')->count();

            //Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('status', '=', '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::count();
        }


        $search_word = "";

        return view("backEnd.categories.categories",
            compact("Categories", "GeneralWebmasterSections", "CategoriesGroups", "Countries", "AllCategoriesCount", "search_word"));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function indexUpdate($group_id = null)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroups = CategoriesGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CategoriesGroups = CategoriesGroup::orderby('id', 'asc')->get();
        }
        //List of Countries
        $Countries = Country::orderby('title_' . trans('backLang.boxCode'), 'asc')->get();
      
                $Categories = Category::where('created_by', '=', Auth::user()->id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            
        
        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Categories
          //  $WaitCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '0')->count();
            //Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '2')->count();
            //Count of All Categories
            $AllCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Categories
            // $WaitCategoriesCount = Category::where('status', '=', '0')->count();
            //Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('status', '=', '2')->count();
            //Count of All Categories
            $AllCategoriesCount = Category::count();
        }
        $search_word = "";
        // return view("backEnd.CategoriesAdd", compact("Categories", "GeneralWebmasterSections", "CategoriesGroups", "Countries", "WaitCategoriesCount", "BlockedCategoriesCount", "AllCategoriesCount", "group_id", "search_word"));
        $CategoryToEdit = Category::find($group_id);
        // dd($CategoryToEdit);
        if (!empty($CategoryToEdit)) {
            // dd($CategoryToEdit);
            return view("backEnd.CategoriesAdd", compact("Categories", "group_id", "CategoriesGroups", "Countries", "GeneralWebmasterSections", "CategoryToEdit"));
            // redirect()->action('categoriesController@index', $CategoryToEdit->id)->with('CategoryToEdit', $CategoryToEdit);
        } else {
            return view("backEnd.CategoriesAdd", compact("Categories", "group_id", "CategoriesGroups", "Countries", "GeneralWebmasterSections", "CategoryToEdit"));
        }
    }

    public function indexEdit($group_id = null)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroups = CategoriesGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CategoriesGroups = CategoriesGroup::orderby('id', 'asc')->get();
        }
        //List of Countries
        $Countries = Country::orderby('title_' . trans('backLang.boxCode'), 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($group_id > 0) {
                //List of group Categories
                // $Categories = Category::where('created_by', '=', Auth::user()->id)->where('group_id', '=',
                    // $group_id)->orderby('id',
                    //'desc')->paginate(env('BACKEND_PAGINATION'));
            /*} elseif ($group_id == "wait") {
                //List waiting activation Categories
                $Categories = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                    '0')->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "blocked") {
                //List waiting activation Categories
                // $Categories = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                    // '2')->orderby('id',
                    // 'desc')->paginate(env('BACKEND_PAGINATION')); */
            } else {
                //List of all Categories
                $Categories = Category::where('created_by', '=', Auth::user()->id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        } else {
            if ($group_id > 0) {
                //List of group Categories
                //$Categories = Category::where('group_id', '=', $group_id)->orderby('id',
                //    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "wait") {
                //List waiting activation Categories
                // $Categories = Category::where('status', '=', '0')->orderby('id',
                //    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "blocked") {
                //List waiting activation Categories
                // $Categories = Category::where('status', '=', '2')->orderby('id',
                 //   'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all Categories
                $Categories = Category::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        }

        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Categories
            //$WaitCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '0')->count();

            //Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
            //    '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Categories
            // $WaitCategoriesCount = Category::where('status', '=', '0')->count();

            // Count of Blocked Categories
            // $BlockedCategoriesCount = Category::where('status', '=', '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::count();
        }


        $search_word = "";

        return view("backEnd.CategoriesAdd",
            compact("Categories", "GeneralWebmasterSections", "CategoriesGroups", "Countries", "AllCategoriesCount", "group_id", "search_word"));
    }



    /**
     * Search resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroups = CategoriesGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CategoriesGroups = CategoriesGroup::orderby('id', 'asc')->get();
        }

        //List of Countries
        $Countries = Country::orderby('title_' . trans('backLang.boxCode'), 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($request->q != "") {
                //find Categories
                $Categories = Category::where('created_by', '=', Auth::user()->id)->where('first_name', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all Categories
                $Categories = Category::where('created_by', '=', Auth::user()->id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        } else {
            if ($request->q != "") {
                //find Categories
                $Categories = Category::where('first_name', 'like', '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all Categories
                $Categories = Category::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        }
        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Categories
            $WaitCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '0')->count();

            //Count of Blocked Categories
            $BlockedCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Categories
            $WaitCategoriesCount = Category::where('status', '=', '0')->count();

            //Count of Blocked Categories
            $BlockedCategoriesCount = Category::where('status', '=', '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::count();
        }
        $group_id = "";
        $search_word = $request->q;

        return view("backEnd.Categories",
            compact("Categories", "GeneralWebmasterSections", "CategoriesGroups", "Countries", "WaitCategoriesCount",
                "BlockedCategoriesCount", "AllCategoriesCount", "group_id", "search_word"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeGroup(Request $request)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        $CategoriesGroup = new CategoriesGroup;
        $CategoriesGroup->name = $request->name;
        $CategoriesGroup->created_by = Auth::user()->id;
        $CategoriesGroup->save();

        return redirect()->action('categoriesController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        //
        $this->validate($request, [
            'file' => 'mimes:png,jpeg,jpg,gif|max:3000'
        ]);


        // Start of Upload Files
        $formFileName = "file";
        $fileFinalName_ar = "";
        if ($request->$formFileName != "") {
            $fileFinalName_ar = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName_ar);
        }
        // End of Upload Files

        $Category = new Category;
        $Category->photo = $fileFinalName_ar;
        $Category->color = $request->color;
        $Category->name = $request->name;
        $Category->category_meta = $request->category_meta;
        $Category->category_description = $request->category_description;
        $Category->category_keywords = $request->category_keywords;
        $Category->created_by = Auth::user()->id;
        $Category->save();

        return redirect()->action('categoriesController@index');
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $CategoryToEdit = Category::find($id);
        if (!empty($CategoryToEdit)) {
            return redirect()->action('categoriesController@indexUpdate', $CategoryToEdit->group_id)->with('CategoryToEdit',
                $CategoryToEdit);
        } else {
            return redirect()->action('categoriesController@index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $EditCategoriesGroup = CategoriesGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $EditCategoriesGroup = CategoriesGroup::find($id);
        }
        if (!empty($EditCategoriesGroup)) {
            return redirect()->action('categoriesController@index')->with('EditCategoriesGroup', $EditCategoriesGroup);
        } else {
            return redirect()->action('categoriesController@index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(123);
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Category = Category::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Category = Category::find($id);
        }
        if (!empty($Category)) {


            $this->validate($request, [
                'file' => 'mimes:png,jpeg,jpg,gif|max:3000'
            ]);


            // Start of Upload Files
            $formFileName = "file";
            $fileFinalName_ar = "";
            if ($request->$formFileName != "") {
                $fileFinalName_ar = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName_ar);
            }
            // End of Upload Files

            $Category->photo = $fileFinalName_ar;
            $Category->color = $request->color;
            $Category->name = $request->name;
            $Category->category_meta = $request->category_meta;
            $Category->category_description = $request->category_description;
            $Category->category_keywords = $request->category_keywords;

            if ($fileFinalName_ar != "") {
                // Delete a Category file
                if ($Category->photo != "") {
                    File::delete($this->getUploadPath() . $Category->photo);
                }

                $Category->photo = $fileFinalName_ar;
            }

            $Category->save();  
            return redirect()->action('categoriesController@index')->with('CategoryToEdit', $Category)->with('doneMessage2',
                trans('backLang.saveDone'));
        } else {
            return redirect()->action('categoriesController@index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateGroup(Request $request, $id)
    {
        //
        $CategoriesGroup = CategoriesGroup::find($id);
        if (!empty($CategoriesGroup)) {
            $CategoriesGroup->name = $request->name;
            $CategoriesGroup->updated_by = Auth::user()->id;
            $CategoriesGroup->save();
        }
        return redirect()->action('categoriesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Category = Category::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Category = Category::find($id);
        }
        if (!empty($Category)) {
            // Delete a Category file
            if ($Category->photo != "") {
                File::delete($this->getUploadPath() . $Category->photo);
            }

            $Category->delete();
        }
        return redirect()->action('categoriesController@index');

    }

    public function destroyGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroup = CategoriesGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $CategoriesGroup = CategoriesGroup::find($id);
        }
        if (!empty($CategoriesGroup)) {
            $CategoriesGroup->delete();
            return redirect()->action('categoriesController@index');
        } else {
            return redirect()->action('categoriesController@index');
        }
    }

    /**
     * Update all selected resources in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        //
        if($request->ids != "") {
            if ($request->action == "activate") {
                Category::wherein('id', $request->ids)
                    ->update(['status' => 1]);

            } elseif ($request->action == "block") {
                Category::wherein('id', $request->ids)
                    ->update(['status' => 0]);

            } elseif ($request->action == "delete") {
                // Check Permissions
                if (!@Auth::user()->permissionsGroup->delete_status) {
                    return Redirect::to(route('NoPermission'))->send();
                }
                // Delete Categories file
                $Categories = Category::wherein('id', $request->ids)->get();
                foreach ($Categories as $Category) {
                    if ($Category->photo != "") {
                        File::delete($this->getUploadPath() . $Category->photo);
                    }
                }

                Category::wherein('id', $request->ids)
                    ->delete();

            }
        }
        return redirect()->action('categoriesController@index')->with('doneMessage', trans('backLang.saveDone'));
    }

    /**
     * This function show x entries of categories
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function showEntries(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CategoriesGroups = CategoriesGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CategoriesGroups = CategoriesGroup::orderby('id', 'asc')->get();
        }
        //List of Countries
        $Countries = Country::orderby('title_' . trans('backLang.boxCode'), 'asc')->get();

        $show_entries = $request->input('show-entries');

        $Categories = Category::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->paginate( $show_entries );

        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Categories
            $WaitCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '0')->count();

            //Count of Blocked Categories
            $BlockedCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Categories
            $WaitCategoriesCount = Category::where('status', '=', '0')->count();

            //Count of Blocked Categories
            $BlockedCategoriesCount = Category::where('status', '=', '2')->count();

            //Count of All Categories
            $AllCategoriesCount = Category::count();
        }


        $search_word = "";

        return view("backEnd.categories.categories",
            compact("Categories", "GeneralWebmasterSections", "CategoriesGroups", "Countries", "WaitCategoriesCount",
                "BlockedCategoriesCount", "AllCategoriesCount", "search_word"));
    }

    /**
     * Edit the category
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        $CategoryToEdit = Category::find($id);

        return view("backEnd.CategoriesAdd", compact("CategoryToEdit", "GeneralWebmasterSections"));
    }

}