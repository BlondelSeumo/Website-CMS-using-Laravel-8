@extends('layouts.front')

@section('title') {{$aboutsetting->meta_title}} @endsection
@section('meta') {{$aboutsetting->meta_description}} @endsection

@section('styles')
<link href="{{ asset('css/front/magnific.min.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{!!$aboutsetting->meta_title!!}</h1>
       <ul class="page-list">
            <li class="item-home"><a class="bread-link" href="{{ route('home') }}" title="Home">{{$aboutsetting->breadcrumbs_anchor}}</a></li>
            <li class="separator separator-home"></li>
            <li class="item-current">{{$aboutsetting->meta_title}}</li>
        </ul>
   </div>

   <div class="about-us">
       <div class="container">
           <div class="row align-items-center">
               <div class="col-md-5">
       
                   <div class="simpleParallax-video">
                        <div class="simpleParallax">
                            <img width="500" height="665" src="/public/img/loading-blog.gif" class="lazy thumparallax img-fluid" data-src="{{$aboutsetting->about_image}}" alt="about-image">
                        </div>
                        <a class="popup-vimeo-video" href="{{$aboutsetting->about_ytlink}}">
                            <i class="far fa-play-circle"></i>
                        </a>
                    </div>
               </div>
               <div class="col-md-7">


                    <h4 class="about-heading1-home">{{$aboutsetting->about_subtitle}}</h4>
                    <h3 class="about-heading2-home">{!!$aboutsetting->about_title!!}</h3>

                    {!!$aboutsetting->about_description!!}

                    <a href="{{$aboutsetting->about_buttonlink}}" target="_self" class="btn btn-style1"><span>{{$aboutsetting->about_buttontext}}</span></a>
       
                   
               </div>
           </div>
       </div>
   </div>
   
   <div class="members-section">
        <div class="container">
            <h3 class="members-heading1">{!!$aboutsetting->member_title_section!!}</h3>
        

            <div class="row">
                @foreach($members as $member)
                  <div class="col-md-4">
                      <div class="venor-team">
                          <div class="thumbnail"> 
                              <img width="350" height="350" class="lazy img-fluid" src="/public/img/loading-blog.gif" data-src="{{$member->photo ? '/public/images/media/' . $member->photo->file : '/public/img/200x200.png'}}" alt="team-venor">
                          </div>
                          <div class="content">
                              <h5 class="title">{{$member->name}}</h5>
                              <p class="position">{{$member->position}}</p>
                          </div>
                          <ul class="social-icon">
                              <li><a target="_blank" rel="noopener" href="{{$member->facebook}}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a target="_blank" rel="noopener" href="{{$member->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a target="_blank" rel="noopener" href="{{$member->twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                          </ul>
                      </div>
                  </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="testimonial-section">

        <div class="testimonial-section-slider owl-carousel">

            @foreach($testimonials as $testimonial)
            <blockquote class="testimonial-slide">
                <div class="section_title">{{$testimonial->subtitle}}</div>
                <span class="testimonial_slider_title">{{$testimonial->title}}</span>
                    <div class="testimonial-area">
                        <div class="testimonial-layoutArea">
                           <p>{{$testimonial->description}}</p>
                        </div>
                    </div>
                <div class="testimonials_slider_name"> {{$testimonial->name}}<span> - {{$testimonial->position}}</span></div>
            </blockquote>
            @endforeach

        </div>

    </div>


    <div class="clients-section">
        <div class="container">
            
            <div class="clients-slider owl-carousel">
                  @foreach($clients as $client)
                  <div class="clients-slide">
                      <a title="{{$client->company_name}}" target="_blank" href="{{$client->company_link}}"><img class="client_image owl-lazy" data-src="{{$client->photo ? '/public/images/media/' . $client->photo->file : '/public/img/200x200.png'}}" alt="{{$client->company_name}}"></a>
                  </div>
                  @endforeach
            </div>
            
        </div>
    </div>



@endsection

