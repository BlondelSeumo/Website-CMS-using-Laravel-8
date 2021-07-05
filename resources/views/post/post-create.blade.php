

@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_article') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_article') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('post.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_blogpage') , array('Attr.EnableID' => true))}}</a>
                    </div>

                    <div class="col-lg-6 text-right">
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


                @if ($message = Session::get('post_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row">
                    <div class="col-md-12">

                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <input type="hidden" name="language_id" value="{{$lang_id}}">

                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                                <div class="slug-container"><span>{{URL::to('/')}}/{{clean( trans('niva-backend.post') , array('Attr.EnableID' => true))}}/</span><input type="text" name="slug" class="form-control" placeholder=""></div>
                                            </div>
                                        </div>  
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.categories') , array('Attr.EnableID' => true))}}</strong>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option>{{clean( trans('niva-backend.choose_category') , array('Attr.EnableID' => true))}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>  
                                    </div>
                                   
                                   
                                    
                                    
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="body" class="form-control" id="body" rows="20"></textarea>
                                    </div>


                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
  

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create_article') , array('Attr.EnableID' => true))}}</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection

