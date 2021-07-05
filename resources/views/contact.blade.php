@extends('layouts.front')

@section('title') {{$contactsetting->meta_title}} @endsection
@section('meta') {{$contactsetting->meta_description}} @endsection


@section('content')
  
  
   <div class="breadcrumb-area">
       <h1 class="breadcrumb-title">{{$contactsetting->meta_title}}</h1>
       <ul class="page-list">
            <li class="item-home"><a class="bread-link" href="{{ route('home') }}" title="Home">{{$contactsetting->breadcrumbs_anchor}}</a></li>
            <li class="separator separator-home"></li>
            <li class="item-current">{{$contactsetting->meta_title}}</li>
        </ul>
   </div>


   <div class="contant-section-page">
      
      <div class="container">
        
          <div class="row">
                  
                  <div class="col-md-4">
                      <div class="contact-element-wrapper">
                        <div class="contact-element">
                          <div class="icon"> {!!$contactsetting->box_icon1!!}</div>
                          <div class="content">
                            <h3 class="title">{!!$contactsetting->box_title1!!}</h3>
                            {!!$contactsetting->box_html1!!}
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="contact-element-wrapper">
                        <div class="contact-element">
                          <div class="icon"> {!!$contactsetting->box_icon2!!}</div>
                          <div class="content">
                            <h3 class="title">{!!$contactsetting->box_title2!!}</h3>
                            {!!$contactsetting->box_html2!!}
                          </div>
                        </div>
                      </div>
                  </div>


                  <div class="col-md-4">
                      <div class="contact-element-wrapper">
                        <div class="contact-element">
                          <div class="icon"> {!!$contactsetting->box_icon3!!}</div>
                          <div class="content">
                            <h3 class="title">{!!$contactsetting->box_title3!!}</h3>
                            {!!$contactsetting->box_html3!!}
                          </div>
                        </div>
                      </div>
                  </div>


          </div>


      </div>

   </div>

  <div class="iframe-contact">
    <div class="container">
      <div class="row">
        
        <div class="col-md-6">
            <h3> {!!$contactsetting->title!!} </h3>
            {!!$contactsetting->iframe_txt!!}
        </div>

        <div class="col-md-6">

              <h3>{!!$contactsetting->form_title!!}</h3>

              @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                      <strong>{{ $message }}</strong>
                  </div>
              @endif

              {!! NoCaptcha::renderJs() !!}

              

              <form method="POST" action="{{route('contactPost')}}">
                 
                 @csrf
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder=" {!!$contactsetting->form_input_name!!} ">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                              placeholder="{!!$contactsetting->form_input_email!!}">
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input name="phone" type="text" class="form-control" id="phone" aria-describedby="name" placeholder="{!!$contactsetting->form_input_budget!!}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          <input name="budget" type="text" class="form-control" id="budget" aria-describedby="emailHelp"
                              placeholder="{!!$contactsetting->form_input_phone!!}">
                          <span class="text-danger">{{ $errors->first('budget') }}</span>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <textarea name="comment" placeholder="{!!$contactsetting->form_message!!}" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                </div>



             
                {!! NoCaptcha::display() !!}

                @if ($errors->has('g-recaptcha-response'))
                  <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif


                <button type="submit" class="btn btn-style1">{!!$contactsetting->button_text!!}</button>
            </form>
        
        </div>


      </div>
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

