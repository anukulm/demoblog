

@extends('frontend/layouts/default')

@section('title', 'NAOMI NASH' | 'Login' )

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
                                    <h3 class="title">{{ __('Register') }} Here</h3>
                                     <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                     <div class="form-element margin-bottom-20">

                                             <input id="name" placeholder="Full Name" type="text" class="input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                                         @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-element margin-bottom-20">

                                            <input id="email" type="email" placeholder="Email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-element margin-bottom-20">
                                           
                                            <input id="password" placeholder="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-element margin-bottom-20">
                                           
                                            <input id="password-confirm" placeholder="Confirm password" type="password" class="input-field @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                               @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                        </div>
                      


                                        <input type="submit" class="submit-btn btn-rounded"value="Register">
                                       
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
