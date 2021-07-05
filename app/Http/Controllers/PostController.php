<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\HeaderFooterSetting; 
use App\Models\Setting;
use App\Models\BlogSetting;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest; 
use App\Http\Requests\PostEditRequest; 
use App\Models\Photo;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;
use View;


class PostController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['posts'] = Post::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('post.post-index', $data, compact('langs'));


    }

    public function create(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        $categories = DB::select('select * from categories where language_id='.$lang_id);
        return view('post.post-create', compact('categories', 'langs', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {


        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images/media/', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        return back()->with('post_success','Post created successfully!');
    }



    public function edit(Post $post, Request $request)
    {

        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        $categories = DB::select('select * from categories where language_id='.$lang_id);
        return view('post.post-edit', compact('post', 'categories'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, Post $post)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $post->update($input);

        return back()->with('post_success','Post updated successfully!');
    }

    public function delete_post(Request $request, Post $post) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $posts = Post::findOrFail($request->checkbox_array);
            foreach ($posts as $post) {
                $post->delete();
            }
            return back()->with('posts_success','Post/s deleted successfully!');
        } else {
            return back();
        }

        $posts = Post::findOrFail($request->checkbox_array);
        foreach ($posts as $post) {
            $post->delete();
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
        $data['blogsettings'] = BlogSetting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();


        $article = Post::whereSlug($slug)->where('language_id', $lang_id)->first();




        if(!empty($article)) {
            return View::make('article', $data, compact('langs'))->with('post', $article);
        } else {
            abort(404);
        }
        
    }



}
