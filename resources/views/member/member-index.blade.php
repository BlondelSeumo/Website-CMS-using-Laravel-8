@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_members') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_members') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <a href="{{route('about-setting.edit')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_aboutpage') , array('Attr.EnableID' => true))}}</a>
                <a href="{{route('member.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('member_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
               

                <form action="{{route('delete.member')}}" method="POST" class="form-inline">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <select name="checkbox_array" id="" class="form-control">
                        <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary">
                </div>



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="options"></th>
                            <th>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.position') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.position') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($members)
                            @foreach($members as $member)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$member->id}}"></td>
                                    <td><img height="100" src="{{$member->photo ? '/public/images/media/' . $member->photo->file : '/public/img/200x200.png'}}" alt="">
                                    <p class="mb-0 mt-2"><a href="{{ route('member.edit', $member->id) }}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p>
                                    </td>

                                    <td data-label="link">{{$member->name}}</td>
                                    <td data-label="link">{{$member->position}}</td>
                                </tr>
                             @endforeach
                        @endif


                        
                    </tbody>
                </table>

                </form>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

