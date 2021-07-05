@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.edit_article') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.edit_article') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('post.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_blogpage') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('post_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" placeholder="" value="{{$post->title}}">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                                <div class="slug-container"><span>{{URL::to('/')}}/{{clean( trans('niva-backend.post') , array('Attr.EnableID' => true))}}/</span><input type="text" name="slug" class="form-control" placeholder="" value="{{$post->slug}}"></div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img class="img-fluid pb-4" width="100" height="100" src="{{$post->photo ? '/public/images/media/' . $post->photo->file : '/public/img/200x200.png'}}">
                                                <p><strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong></p>
                                                <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.categories') , array('Attr.EnableID' => true))}}</strong>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option @if($post->category_id == $category->id) { selected="selected" } @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="body" class="form-control" id="body" rows="20">{{clean( $post->body , array('Attr.EnableID' => true))}}</textarea>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" placeholder="" value="{{$post->meta_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" placeholder="" value="{{$post->meta_description}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
					   
					            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
					                <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
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

