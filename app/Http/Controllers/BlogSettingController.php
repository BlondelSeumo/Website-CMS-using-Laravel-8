<?php
namespace App\Http\Controllers;

use App\Models\BlogSetting;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;


class BlogSettingController extends Controller
{
    //

    public function edit(Request $request)
    {


        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = BlogSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = BlogSetting::findOrFail($lang->id);
        }

        return view('settings.blog.blog-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogSetting $setting, $langid)
    {
        $setting = BlogSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }



}
