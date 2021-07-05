@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.edit_project') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.edit_project') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('project.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_projectpage') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('project_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" placeholder="" value="{{$project->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                                <div class="slug-container"><span>{{URL::to('/')}}/{{clean( trans('niva-backend.project') , array('Attr.EnableID' => true))}}/</span><input type="text" name="slug" class="form-control" placeholder="" value="{{$project->slug}}"></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img class="img-fluid pb-4" width="100" height="100" src="{{$project->photo ? '/public/images/media/' . $project->photo->file : '/public/img/200x200.png'}}">
                                                <p><strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong></p>
                                                <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}} <span>{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}} <a target="_blank" href="{{route('media.create')}}"> {{clean( trans('niva-backend.here') , array('Attr.EnableID' => true))}} </a> {{clean( trans('niva-backend.then_copy_url') , array('Attr.EnableID' => true))}} <a target="_blank" href="{{route('media.index')}}"> {{clean( trans('niva-backend.here') , array('Attr.EnableID' => true))}} </a></span></strong>
                                                <input type="text" name="image_featured2" class="form-control" placeholder="" value="{{$project->image_featured2}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.categories') , array('Attr.EnableID' => true))}}</strong>
                                        <select name="project_category_id" id="project_category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option @if($project->project_category_id == $category->id) { selected="selected" } @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="body" class="form-control" id="body" rows="25">{{clean( $project->body , array('Attr.EnableID' => true))}}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}} 1</strong>
                                                 <img class="img-fluid pb-4" width="100" height="100" src="{{$project->img_gal1 ? $project->img_gal1 : '/public/img/200x200.png'}}">
                                                <input type="text" name="img_gal1" class="form-control" placeholder="" value="{{$project->img_gal1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}} 2</strong>
                                                 <img class="img-fluid pb-4" width="100" height="100" src="{{$project->img_gal2 ? $project->img_gal2 : '/public/img/200x200.png'}}">
                                                <input type="text" name="img_gal2" class="form-control" placeholder="" value="{{$project->img_gal2}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}} 3</strong>
                                                 <img class="img-fluid pb-4" width="100" height="100" src="{{$project->img_gal3 ? $project->img_gal3 : '/public/img/200x200.png'}}">
                                                <input type="text" name="img_gal3" class="form-control" placeholder="" value="{{$project->img_gal3}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}} 4</strong>
                                                 <img class="img-fluid pb-4" width="100" height="100" src="{{$project->img_gal4 ? $project->img_gal4 : '/public/img/200x200.png'}}">
                                                <input type="text" name="img_gal4" class="form-control" placeholder="" value="{{$project->img_gal4}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.duration_project') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="date" class="form-control" placeholder="" value="{{$project->date}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.client') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="client" class="form-control" placeholder="" value="{{$project->client}}">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="button_text" class="form-control" placeholder="" value="{{$project->button_text}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="button_link" class="form-control" placeholder="" value="{{$project->button_link}}">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" placeholder="" value="{{$project->meta_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" placeholder="" value="{{$project->meta_description}}">
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

