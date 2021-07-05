<?php
namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;

class HomeSettingController extends Controller
{
    //

    public function edit(Request $request)
    {

        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = HomeSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = HomeSetting::findOrFail($lang->id);
        }
        return view('settings.home.home-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSetting $setting, $langid)
    {
        $setting = HomeSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }



}
