<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;

class SettingController extends Controller
{
    //

    public function edit(Request $request)
    {
        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = Setting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = Setting::findOrFail($lang->id);
        }


        return view('settings.edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting, $langid)
    {

        $setting = Setting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $this->validate($request, [

            'photo_id' => 'mimes:jpg,jpeg,png,webp,gif,svg']

        );

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }




}
