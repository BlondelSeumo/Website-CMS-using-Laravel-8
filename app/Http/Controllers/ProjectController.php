<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest; 
use App\Http\Requests\ProjectEditRequest; 
use App\Models\Photo;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\HeaderFooterSetting; 
use DB;
use View;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;

class ProjectController extends Controller
{
    //


    public function index(Request $request)
    {
        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['projects'] = Project::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('project.project-index', $data, compact('langs'));

    }

    public function create(Request $request)
    {
        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        $categories = DB::select('select * from project_categories where language_id='.$lang_id);
        return view('project.project-create', compact('categories', 'langs', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {


        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->projects()->create($input);

        return back()->with('project_success','Project created successfully!');
    }



    public function edit(Project $project, Request $request)
    {

        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        $categories = DB::select('select * from project_categories where language_id='.$lang_id);
        return view('project.project-edit', compact('project', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectEditRequest $request, Project $project)
    {
        
        $input = $request->all();
        

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $project->update($input);

        return back()->with('project_success','Project updated successfully!');
    }

    public function delete_project(Request $request, Project $project) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $projects = Project::findOrFail($request->checkbox_array);
            foreach ($projects as $project) {
                $project->delete();
            }
            return back()->with('projects_success','Project/s deleted successfully!');
        } else {
            return back();
        }

        $projects = Project::findOrFail($request->checkbox_array);
        foreach ($projects as $project) {
            $project->delete();
        }

        return back();
        //return 'works';
    }

    // Show a project by slug
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


        $project = Project::whereSlug($slug)->where('language_id', $lang_id)->first();

        if(!empty($project)) {
            return View::make('project', $data, compact('langs'))->with('project', $project);
            //return $project;
        } else {
            abort(404);
        }
        
    }


}
