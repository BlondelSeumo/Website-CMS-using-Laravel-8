<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ServiceRequest; 
use App\Models\Photo;
use App\Models\Language;

class ServiceController extends Controller
{
    //


    public function index(Request $request)
    {


        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['services'] = Service::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('service.service-index', $data, compact('langs'));
    }

    public function create()
    {
        $langs = Language::all();
        return view('service.service-create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Service::create($input);

        return back()->with('service_success','Service created successfully!');
    }



    public function edit(Service $service)
    {
        return view('service.service-edit', compact('service'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $service->update($input);

        return back()->with('service_success','Service updated successfully!');
    }

    public function delete_service(Request $request, Service $service) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $services = Service::findOrFail($request->checkbox_array);
            foreach ($services as $service) {
                $service->delete();
            }
            return back()->with('services_success','Service/s deleted successfully!');
        } else {
            return back();
        }

        $services = Service::findOrFail($request->checkbox_array);
        foreach ($services as $service) {
            $service->delete();
        }

        return back();
        //return 'works';
    }



}
