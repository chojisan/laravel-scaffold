@extends('layouts.backend', ['class' => 'bg-default'])

@section('content')
<div>
    <!-- Header -->
    @include('partials.headers.guest')

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4">
                            <small>{{ __('Sign up with') }}</small>
                        </div>
                        <div class="text-center">
                          <a href="#" class="btn btn-neutral btn-icon mr-4">
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
                            <small>Or sign up with credentials</small>
                          </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                  </div>
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                                  @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">
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
                                  <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" type="password">
                                  @error('password')
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
                                  <input id="password-confirm" class="form-control"  name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" type="password">
                                </div>
                              </div>

                              <div class="text-muted font-italic"><small>{{ __('password strength:') }} <span class="text-success font-weight-700">{{ __('strong') }}</span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">{{ __('I agree with the') }} <a href="http://www.takada.io/privacy">{{ __('Privacy Policy') }}</a></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
                  </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
