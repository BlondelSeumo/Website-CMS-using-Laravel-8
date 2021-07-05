<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use App\Http\Requests\UserEditRequest; 
use App\Models\Role;
use App\Models\Photo;
use Illuminate\Support\Facades\Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::select('select * from roles');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        User::create($input);

        return redirect('/admin/users/create')->with('user_success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = DB::select('select * from roles');
        return view('users.edit', compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
     
        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return back()->with('user_success','User updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/users');
    }

    public function delete_users(Request $request, User $user) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $users = User::findOrFail($request->checkbox_array);
            foreach ($users as $user) {
                if($user->id != $request->current_user){
                    $user->delete();
                }
            }
            return back()->with('user_success','User/s deleted successfully! The current user can\'t be deleted!');
        } else {
            return redirect('/admin/users');
        }

        $users = User::findOrFail($request->checkbox_array);
        foreach ($users as $user) {
            $user->delete();
        }

        return redirect('/admin/users');
        //return 'works';
    }
}
