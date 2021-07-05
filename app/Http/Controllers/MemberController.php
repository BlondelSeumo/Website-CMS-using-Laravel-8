<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MemberRequest; 
use App\Models\Photo;

class MemberController extends Controller
{
    //


    public function index()
    {
        $members = Member::all();
        return view('member.member-index', compact('members'));
    }

    public function create()
    {
        return view('member.member-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Member::create($input);

        return back()->with('member_success','Member created successfully!');
    }



    public function edit(Member $member)
    {
        return view('member.member-edit', compact('member'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $member->update($input);

        return back()->with('member_success','Member updated successfully!');
    }

    public function delete_member(Request $request, Member $member) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $members = Member::findOrFail($request->checkbox_array);
            foreach ($members as $member) {
                $member->delete();
            }
            return back()->with('members_success','Member/s deleted successfully!');
        } else {
            return back();
        }

        $members = Member::findOrFail($request->checkbox_array);
        foreach ($members as $member) {
            $member->delete();
        }

        return back();
        //return 'works';
    }



}
