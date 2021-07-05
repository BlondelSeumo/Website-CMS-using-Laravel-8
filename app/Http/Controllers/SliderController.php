<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SliderRequest; 
use App\Models\Photo;
use App\Models\Language;

class SliderController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['sliders'] = Slider::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('slider.slider-index', $data, compact('langs'));
    }

    public function create()
    {
        $langs = Language::all();
        return view('slider.slider-create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Slider::create($input);

        return back()->with('slider_success','Slide created successfully!');
    }



    public function edit(Slider $slider)
    {
        return view('slider.slider-edit', compact('slider'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $slider->update($input);

        return back()->with('slider_success','Slide updated successfully!');
    }

    public function delete_slider(Request $request, Slider $slider) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $sliders = Slider::findOrFail($request->checkbox_array);
            foreach ($sliders as $slider) {
                $slider->delete();
            }
            return back()->with('sliders_success','Slider/s deleted successfully!');
        } else {
            return back();
        }

        $sliders = Slider::findOrFail($request->checkbox_array);
        foreach ($sliders as $slider) {
            $slider->delete();
        }

        return back();
        //return 'works';
    }



}
