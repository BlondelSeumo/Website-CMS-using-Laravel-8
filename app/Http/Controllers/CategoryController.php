<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest; 
use App\Models\Language;

class CategoryController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['categories'] = Category::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('post.categories.category-index', $data, compact('langs'));

    }

    public function create()
    {
        return view('category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {


        $input = $request->all();


        Category::create($input);

        return back()->with('category_success','Category created successfully!');
    }



    public function edit(Category $category)
    {
        return view('post.categories.category-edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        
        $input = $request->all();

        $category->update($input);

        return back()->with('category_success','Category updated successfully!');
    }

    public function delete_category(Request $request, Category $category) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $categories = Category::findOrFail($request->checkbox_array);
            foreach ($categories as $category) {
                $category->delete();
            }
            return back()->with('category_success','Category/s deleted successfully!');
        } else {
            return back();
        }

        $categories = Category::findOrFail($request->checkbox_array);
        foreach ($categories as $category) {
            $category->delete();
        }

        return back();
        //return 'works';
    }



}
