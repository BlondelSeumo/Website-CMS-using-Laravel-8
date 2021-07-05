<?php
namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PricingRequest; 
use App\Models\Language;

class PricingController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();

        if (empty($request->language)) {
            $lang_id = 1;
            $data['pricings'] = Pricing::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $lang_id = $lang->id;
            $data['pricings'] = Pricing::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);
        }



        return view('pricing.pricing-index', $data, compact('langs'));
    }

    public function create(Request $request)
    {


        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        return view('pricing.pricing-create', compact('langs', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricingRequest $request)
    {


        $input = $request->all();


        Pricing::create($input);

        return back()->with('pricing_success','Pricing created successfully!');
    }



    public function edit(Pricing $pricing)
    {
        return view('pricing.pricing-edit', compact('pricing'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(PricingRequest $request, Pricing $pricing)
    {
        
        $input = $request->all();

        $pricing->update($input);

        return back()->with('pricing_success','Pricing updated successfully!');
    }

    public function delete_pricing(Request $request, Pricing $pricing) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $pricings = Pricing::findOrFail($request->checkbox_array);
            foreach ($pricings as $pricing) {
                $pricing->delete();
            }
            return back()->with('pricings_success','Pricing/s deleted successfully!');
        } else {
            return back();
        }

        $pricings = Pricing::findOrFail($request->checkbox_array);
        foreach ($pricings as $pricing) {
            $pricing->delete();
        }

        return back();
        //return 'works';
    }



}
