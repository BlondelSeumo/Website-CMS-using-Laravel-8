@extends('layouts.front')

@section('title') {{$page->meta_title}} @endsection
@section('meta') {{$page->meta_description}} @endsection



@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{{$page->meta_title}}</h1>
   </div>

   <div class="page-content">
   		<div class="container">
   			{!!$page->body!!}
   		</div>
   		
   </div>





@endsection

