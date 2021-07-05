@extends('layouts.front')


@section('title')  @endsection
@section('meta')  @endsection

@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{{clean( trans('niva-backend.you_searched_for') , array('Attr.EnableID' => true))}} {{$term}}</h1>
   </div>

   

 

   <div class="portfolio-section-filters">
      <div class="container">
        <div class="row">

            <div class="col-md-12">
                  <div class="projects projects-page row">

                  	@if(count($project_list))
	                      @foreach($project_list as $project)
	                      <div class="project col-md-4" data-filter="{{$project->project_category->name}}">
	                        <div class="project-inner">
	                            <div class="project-thumbnail">
	                              <a href="{{URL::to('/')}}/project/{{$project->slug}}" title=""><img width="400" height="250" src="/public/img/loading-blog.gif" data-src="{{$project->photo ? '/public/images/media/' . $project->photo->file : '/public/img/200x200.png'}}" class="lazy img-fluid" alt="{{$project->title}}"></a>
	                              </div>
	                              <h4 class="entry-details-title"> <a href="{{URL::to('/')}}/project/{{$project->slug}}">{{$project->title}}</a></h4>
	                              <h5 class="project-category">{{$project->project_category->name}}</h5>
	                        </div>
	                      </div>
	                      @endforeach
	                @else 
					    <div>
					        <h4 class="no-results">{{clean( trans('niva-backend.no_results') , array('Attr.EnableID' => true))}}</h4>
					    </div>
					@endif     

                  </div>
            </div>

        </div>
      </div>
   </div>





@endsection


@section('scripts')
<script type="text/javascript">
		$(document).ready(function () {
			jQuery('.header__search__venor input').val("{{$term}}") //blade / php dynamic functionality
		});
</script>
@endsection