<?php
namespace App\Http\Controllers;

use App\Models\HeaderFooterSetting;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;

class HeaderFooterSettingController extends Controller
{
    //

    public function edit(Request $request)
    {

        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = HeaderFooterSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = HeaderFooterSetting::findOrFail($lang->id);
        }

        return view('settings.headerfooter.headerfooter-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderFooterSetting $setting, $langid)
    {
        $setting = HeaderFooterSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }


}


