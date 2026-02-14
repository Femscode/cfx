@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('assets/images/hero3.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        align-items: center;
        padding: 20px;
    }
    .container {
        max-width: 600px;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }
    .card-header {
        background: linear-gradient(135deg, #6c757d, #343a40);
        color: white;
        text-align: center;
        font-weight: 600;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0;
        font-size: 1.25rem;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }
    .btn-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 500;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
    }
    .col-form-label {
        font-weight: 500;
        color: #333;
    }
    .invalid-feedback {
        font-size: 0.875rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    @media (max-width: 768px) {
        .card {
            margin: 0 15px;
        }
        .col-md-4, .col-md-6 {
            width: 100%;
            text-align: center;
        }
        .col-md-6.offset-md-4 {
            margin-left: 0;
            text-align: center;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sign Up To Create Your Own Landing Page') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="whatsapp" class="col-md-4 col-form-label text-md-end">{{ __('CapitalXtend Registration Link') }}</label>
                            <div class="col-md-6">
                                <input id="registration_link" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="registration_link" value="{{ old('registration_link') }}" required autocomplete="registration_link">
                                @error('registration_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="whatsapp" class="col-md-4 col-form-label text-md-end">{{ __('WhatsApp Group URL') }}</label>
                            <div class="col-md-6">
                                <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp">
                                @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <br>

                               {{ __('Already have an account?') }}<a href="{{route('login')}}"> Sign In </a>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection