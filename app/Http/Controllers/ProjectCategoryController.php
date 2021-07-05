<?php
namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProjectCategoryRequest; 
use App\Models\Language;

class ProjectCategoryController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['categories'] = ProjectCategory::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('project.categories.project-category-index', $data, compact('langs'));


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCategoryRequest $request)
    {


        $input = $request->all();


        ProjectCategory::create($input);

        return back()->with('category_success','Category created successfully!');
    }



    public function edit(ProjectCategory $project_category)
    {
        return view('project.categories.project-category-edit', compact('project_category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCategoryRequest $request, ProjectCategory $project_category)
    {
        
        $input = $request->all();

        $project_category->update($input);

        return back()->with('category_success','Category updated successfully!');
    }

    public function delete_project_category(Request $request, ProjectCategory $category) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $categories = ProjectCategory::findOrFail($request->checkbox_array);
            foreach ($categories as $category) {
                $category->delete();
            }
            return back()->with('category_success','Category/s deleted successfully!');
        } else {
            return back();
        }

        $categories = ProjectCategory::findOrFail($request->checkbox_array);
        foreach ($categories as $category) {
            $category->delete();
        }

        return back();
        //return 'works';
    }



}
