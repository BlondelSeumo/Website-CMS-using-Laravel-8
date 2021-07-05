<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\HomeSetting;
use App\Models\AboutSetting;
use App\Models\BlogSetting;
use App\Models\PricingSetting;
use App\Models\PortfolioSetting;
use App\Models\ProjectSetting;
use App\Models\ContactSetting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageEditRequest; 
use App\Models\HeaderFooterSetting; 
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Photo;
use DB;
use Illuminate\Support\Facades\Auth;
use View;
use App\Models\Language;


class PageController extends Controller
{
    //


    public function index(Request $request)
    {
        

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['pages'] = Page::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('page.page-index', $data, compact('langs'));
    }

    public function index_custom(Request $request)
    {


        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['home'] = HomeSetting::firstOrFail();
            $data['about'] = AboutSetting::firstOrFail();
            $data['portfolio'] = PortfolioSetting::firstOrFail();
            $data['pricing'] = PricingSetting::firstOrFail();
            $data['contact'] = ContactSetting::firstOrFail();
            $data['blog'] = BlogSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['home'] = HomeSetting::findOrFail($lang->id);
            $data['about'] = AboutSetting::findOrFail($lang->id);
            $data['portfolio'] = PortfolioSetting::findOrFail($lang->id);
            $data['pricing'] = PricingSetting::findOrFail($lang->id);
            $data['contact'] = ContactSetting::findOrFail($lang->id);
            $data['blog'] = BlogSetting::findOrFail($lang->id);
        }
        
        //return $data['home'];
        return view('page.page-custom', $data, compact('langs'));
    }


    public function create(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        return view('page.page-create', compact('langs', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {


        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images/media/', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->pages()->create($input);

        return back()->with('page_success','Page created successfully!');
    }



    public function edit(Page $page)
    {
        return view('page.page-edit',compact('page'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageEditRequest $request, Page $page)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $page->update($input);

        return back()->with('page_success','Page updated successfully!');
    }

    public function delete_page(Request $request, Page $page) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $pages = Page::findOrFail($request->checkbox_array);
            foreach ($pages as $page) {
                $page->delete();
            }
            return back()->with('pages_success','Page/s deleted successfully!');
        } else {
            return back();
        }

        $pages = Page::findOrFail($request->checkbox_array);
        foreach ($pages as $page) {
            $page->delete();
        }

        return back();
        //return 'works';
    }

    // Show a page by slug
    public function show_slug($slug = 'home')
    {


        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();

        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();

        $page = Page::whereSlug($slug)->where('language_id', $lang_id)->first();

        if(!empty($page)) {
            return View::make('page', $data, compact('langs'))->with('page', $page);
        } else {
            abort(404);
        }
        
    }



}
