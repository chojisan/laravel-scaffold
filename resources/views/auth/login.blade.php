@extends('layouts.backend', ['class' => 'bg-default'])

@section('content')
<div>
    <!-- Header -->
    @include('partials.headers.guest')

      <!-- Page content -->
      <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="img/icons/github.svg"></span>
                            <span class="btn-inner--text">{{ __('Github') }}</span>
                          </a>
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="img/icons/google.svg"></span>
                            <span class="btn-inner--text">{{ __('Google') }}</span>
                          </a>
                        </div>
                      </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Or sign in with credentials</small>
                          </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
                                  @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>

                              <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="customCheckLogin" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for=" customCheckLogin">
                                  <span class="text-muted">{{ __('Remember Me') }}</span>
                                </label>
                              </div>

                              <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                              </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    @if (Route::has('password.request'))
                    <div class="col-6">
                                        <a class="text-light" href="{{ route('password.request') }}">
                                            <small>{{ __('Forgot Your Password?') }}</small>
                                        </a>
                    </div>
                    @endif
                    <div class="col-6 text-right">
                      <a href="{{ route('register') }}" class="text-light">
                        <small>{{ __('Create new account') }}</small>
                    </a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
