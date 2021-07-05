<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TestimonialRequest; 
use App\Models\Language;

class TestimonialController extends Controller
{
    //


    public function index(Request $request)
    {


        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['testimonials'] = Testimonial::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('testimonial.testimonial-index', $data, compact('langs'));
    }

    public function create()
    {
        $langs = Language::all();
        return view('testimonial.testimonial-create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {


        $input = $request->all();


        Testimonial::create($input);

        return back()->with('testimonial_success','Testimonial created successfully!');
    }



    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.testimonial-edit', compact('testimonial'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        
        $input = $request->all();

        $testimonial->update($input);

        return back()->with('testimonial_success','Testimonial updated successfully!');
    }

    public function delete_testimonial(Request $request, Testimonial $testimonial) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $testimonials = Testimonial::findOrFail($request->checkbox_array);
            foreach ($testimonials as $testimonial) {
                $testimonial->delete();
            }
            return back()->with('testimonials_success','Testimonial/s deleted successfully!');
        } else {
            return redirect('/admin/testimonial');
        }

        $testimonials = Testimonial::findOrFail($request->checkbox_array);
        foreach ($testimonials as $testimonial) {
            $testimonial->delete();
        }

        return back();
        //return 'works';
    }



}
