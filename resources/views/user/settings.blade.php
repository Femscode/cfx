@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span>Settings</span>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="referral-link-container">
                        <span class="section-title">Referral Settings</span>
                        <form method="POST" action="{{ route('updateRefLink') }}">@csrf
                            <label for="registration-link" class="form-label">Your CapitalX Referral Link</label>
                            <div class="input-group">
                                <input name="registration_link" id="registration-link" type="text" class="form-control" value="{{ auth()->user()->registration_link ?? (config('app.base_url').'/register') }}">
                            </div>
                            <label class="form-label">Your Whatsapp Group Link</label>
                            <div class="input-group">
                                <input name="whatsapp" id="whatsapp-link" type="text" class="form-control" value="{{ auth()->user()->whatsapp ?? 'https://wa.me' }}">
                            </div>
                            <label class="form-label">Your Phone Number</label>
                            <div class="input-group">
                                <input name="phone" id="phone" placeholder="08000000000" type="text" class="form-control" value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="input-group">
                                <button class="btn btn-success" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
