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
                    <div class="card-header bg-transparent">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Verify Your Email Address') }}</small>
                        </div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <div class="text-center text-muted mb-4">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                        </div>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('click here to request another') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
