<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MenuRequest; 
use App\Models\Language;

class MenuController extends Controller
{
    //


    public function index(Request $request)
    {

        $langs = Language::all();
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        //return $lang;

        $data['menus'] = Menu::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('menu.meniu-index', $data, compact('langs'));

    }

    public function create()
    {
        $langs = Language::all();
        return view('menu.meniu-create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {


        $input = $request->all();

        Menu::create($input);

        return back()->with('menu_success','Menu link created successfully!');
    }



    public function edit(Menu $menu)
    {
        return view('menu.menu-edit', compact('menu'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        
        $input = $request->all();

        $menu->update($input);

        return back()->with('menu_success','Menu updated successfully!');
    }

    public function delete_menu(Request $request, Menu $menu) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $menus = Menu::findOrFail($request->checkbox_array);
            foreach ($menus as $menu) {
                $menu->delete();
            }
            return back()->with('menus_success','Menu/s deleted successfully!');
        } else {
            return back();
        }

        $menus = Menu::findOrFail($request->checkbox_array);
        foreach ($menus as $menu) {
            $menu->delete();
        }

        return back()->with('menu_success','Menu deleted successfully!');;
        //return 'works';
    }



}
