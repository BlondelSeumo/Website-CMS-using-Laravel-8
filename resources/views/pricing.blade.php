@extends('layouts.front')


@section('title') {{$pricingsetting->meta_title}} @endsection
@section('meta') {{$pricingsetting->meta_description}} @endsection

@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{{$pricingsetting->meta_title}}</h1>
       <ul class="page-list">
            <li class="item-home"><a class="bread-link" href="{{ route('home') }}" title="Home">{{$pricingsetting->breadcrumbs_anchor}}</a></li>
            <li class="separator separator-home"></li>
            <li class="item-current">{{$pricingsetting->meta_title}}</li>
        </ul>
   </div>

   	<div class="pricing-elements">

   		<div class="container">

   			<h2>{!!$pricingsetting->title!!}</h2>
   			<p>{{$pricingsetting->description}}</p>

	   		<div class="row">

	   			@foreach($pricings as $pricing)
	   			<div class="col-md-4">
	   				<div class="venor-price-box @if($pricing->pricing_switch == 1) premium-pricing @endif">
	   					@if($pricing->pricing_switch == 1) <div class="plan-ribbon-wrapper"><div class="plan-ribbon">{{$pricing->popular_text}}</div></div> @endif
					    {!!$pricing->title!!}
					    <div class="plan-features">
					        {!!$pricing->description!!}
					    </div>
					    <a href="{{$pricing->button_link}}" target="_self" class="btn btn-style1">{{$pricing->button_text}}</a>
					</div>
	   			</div>
	   			@endforeach

	   		</div>
	    </div>
   	</div>
    




@endsection

