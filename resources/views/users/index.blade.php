@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_users') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_users') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                @if ($message = Session::get('user_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('user_fail'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

               

                <form action="{{route('delete.users')}}" method="POST" class="form-inline">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <select name="checkbox_array" id="" class="form-control">
                        <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary">
                    <input type="hidden" name="current_user" value="{{ auth()->user()->id }}">
                </div>



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="options"></th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.role') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.role') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$user->id}}"></td>
                                    <td data-label="Name">
                                        <div class="float-left-avatar">
                                            <img width="35" height="35" src="{{$user->photo ? '/public/images/media/' . $user->photo->file : '/public/img/200x200.png'}}" alt="">
                                        </div>
                                        <div class="float-left-user-name">
                                            <p>{{$user->name}}</p>
                                            <a href="{{ route('users.edit', $user->id) }}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a>
                                        </div>
                                    </td>
                                    <td data-label="Name and surname">{{$user->email}}</td>
                                    <td data-label="Role">{{$user->role ? $user->role->name : ''}}</td>
                                </tr>
                             @endforeach
                        @endif


                        
                    </tbody>
                </table>

                </form>
                 {!! $users->render() !!}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop
