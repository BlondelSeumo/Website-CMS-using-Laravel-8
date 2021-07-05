<?php
namespace App\Http\Controllers;

use App\Models\ContactSetting;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;

class ContactSettingController extends Controller
{
    //

    public function edit(Request $request)
    {


        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = ContactSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = ContactSetting::findOrFail($lang->id);
        }

        return view('settings.contact.contact-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactSetting $setting, $langid)
    {
        $setting = ContactSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }



}
