@extends('layouts.auth')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{clean( trans('niva-backend.welcome_back') , array('Attr.EnableID' => true))}}</h1>
                                </div>
                                 <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="contact@lucian.host" required autocomplete="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" placeholder="{{ __('Password') }}" type="password" id="exampleInputPassword"  class="form-control form-control-user @error('password') is-invalid @enderror" name="password" value="niva12345" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">

                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Login') }}
                                    </button>

                                    <hr>
        
                                    <a  href="{{ url('auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i>{{clean( trans('niva-backend.login_facebook') , array('Attr.EnableID' => true))}}
                                    </a>

                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">{{clean( trans('niva-backend.create_acc') , array('Attr.EnableID' => true))}}</a>
                                </div>
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>




@endsection
