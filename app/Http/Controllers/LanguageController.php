<?php
namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LanguageRequest; 
use App\Models\Photo;

class LanguageController extends Controller
{
    //


    public function index()
    {
        $languages = Language::all();
        return view('language.language-index', compact('languages'));
    }

    public function create()
    {
        return view('language.language-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Language::create($input);

        return back()->with('language_success','Language created successfully!');
    }



    public function edit(Language $language)
    {
        return view('language.language-edit', compact('language'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $language->update($input);

        return back()->with('language_success','Language updated successfully!');
    }

    public function delete_language(Request $request, Language $language) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $languages = Language::findOrFail($request->checkbox_array);
            foreach ($languages as $language) {
                $language->delete();
            }
            return back()->with('languages_success','Language/s deleted successfully!');
        } else {
            return back();
        }

        $languages = Language::findOrFail($request->checkbox_array);
        foreach ($languages as $language) {
            $language->delete();
        }

        return back();
        //return 'works';
    }



}
