

@extends('frontend/layouts/default')

@section('title', 'Login' )

@section('content')


<section class="login-area">
    <div class="container">
      <div class="row">
            <div class="col-lg-12">
                <div class="login-area-inner wow fadeInUp">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="left-content-area"><!-- left ocntent area -->
                                <div class="contact-form-wrapper">
                                    <h3 class="title">Login</h3>
                                     <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-element margin-bottom-20">

                                            <input id="email" type="email" placeholder="Email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-element margin-bottom-20">
                                           
                                            <input id="password" placeholder="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                       <!--  <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
 -->
                                        <input type="submit" class="submit-btn btn-rounded"value="login">
                                        <p>Don't have an account?<a href="{{ route('register') }}"> Signup here</a></p>
                                    </form>
                                </div>
                            </div><!-- //. left content area -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection