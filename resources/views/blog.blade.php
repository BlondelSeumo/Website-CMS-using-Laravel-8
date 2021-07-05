@extends('layouts.front')

@section('title') {{$blogsettings->meta_title}} @endsection
@section('meta') {{$blogsettings->meta_description}} @endsection



@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{{$blogsettings->meta_title}}</h1>
       <ul class="page-list">
            <li class="item-home"><a class="bread-link" href="{{ route('home') }}" title="Home">{{$blogsettings->breadcrumbs_anchor}}</a></li>
            <li class="separator separator-home"></li>
            <li class="item-current">{{$blogsettings->meta_title}}</li>
        </ul>
   </div>

   <div class="blog-page-section">
      <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                
            @foreach($posts as $post)
                <article class="single-post blogloop-v2">
                   <div class="blog_custom">
                      <div class="post-thumbnail">
                         <a href="{{URL::to('/')}}/post/{{$post->slug}}">
                            <img class="blog_post_image img-fluid lazy" width="800" height="550" src="/public/img/loading-blog.gif" data-src="{{$post->photo ? '/public/images/media/' . $post->photo->file : '/public/img/200x200.png'}}" alt="{{$post->title}}">
                          </a>
                      </div>
                      <span class="post-date">{{ date('d.M.Y', strtotime($post->created_at)) }}</span>
                      <!-- POST DETAILS -->
                      <div class="post-details">
                         <div class="post-details-holder">
                            <div class="post-author-avatar">
                               <img alt="" src="/public/img/loading-blog.gif" data-src="{{$post->user->photo ? '/public/images/media/' . $post->user->photo->file : '/public/img/200x200.png'}}" class="avatar img-fluid lazy" height="120" width="120">
                             </div>
                            
                            <h2 class="post-name">
                               <a title="{{$post->title}}" href="{{URL::to('/')}}/post/{{$post->slug}}">
                                  {{$post->title}}                   
                               </a>
                            </h2>

                            <div class="post-category-comment-date">
                               <span class="post-tags"><i class="fa fa-tag"></i>{{$post->category->name}}</span>
                            </div>

                            <div class="post-excerpt">
                               <p>{{$post->meta_description}}</p>
                            </div>
                         </div>
                      </div>
                   </div>
                </article>
            @endforeach




            </div> <!-- col 8 -->

            <div class="col-md-4">
                
                <div class="widget_element">
                   {!!$blogsettings->html_sidebar1!!}
                </div>

                <div class="widget_element">
                   {!!$blogsettings->html_sidebar2!!}
                </div>

            </div>

        </div>
      </div>
   </div>
   
 

@endsection




