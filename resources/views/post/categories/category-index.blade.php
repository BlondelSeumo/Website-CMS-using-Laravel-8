@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.categories') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.categories') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('post.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_blogpage') , array('Attr.EnableID' => true))}}</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right ">
                            @if (!empty($langs))
                                <select name="language" class="form-control language-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                    <option value="" selected disabled>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</option>
                                    @foreach ($langs as $lang)
                                        <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>


                @if ($message = Session::get('category_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
               
                <div class="row">

                    <div class="col-md-6">

                        <form action="{{route('delete.category')}}" method="POST" class="form-inline">
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
                                    <th scope="col">{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                                    <th scope="col">{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" id="options1"></th>
                                    <th scope="col">{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                                    <th scope="col">{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$category->id}}"></td>
                                            <td data-label="ID">{{$category->id}}</td>
                                            <td data-label="name">{{$category->name}}<p class="mb-0 mt-2"><a href="{{ route('category.edit', $category->id) . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                                        </tr>
                                     @endforeach
                                @endif


                                
                            </tbody>
                        </table>

                        </form>
                    </div>

                    <div class="col-md-6">
                        @include('includes.form-errors')

                         <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.category') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control" >
                                        <input type="hidden" name="language_id" value="{{$lang_id}}">
                                    </div>
                                    
                                </div>
  

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

