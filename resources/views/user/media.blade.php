@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span>Media</span>
                </div>
                <div class="card-body">
                    @php
                        $userBanner = null;
                        foreach (['jpg','jpeg','png','webp'] as $ext) {
                            $candidate = public_path('assets/images/user-banners/' . (auth()->id()) . '.' . $ext);
                            if (file_exists($candidate)) {
                                $userBanner = config('app.base_url').'/public/assets/images/user-banners/' . auth()->id() . '.' . $ext;
                                break;
                            }
                        }
                    @endphp
                    <div class="referral-link-container">
                        <span class="section-title">Your Referral Page Banner</span>
                        @if($userBanner)
                            <img src="{{ $userBanner }}" alt="Your Banner" class="banner-img">
                        @else
                            <div class="text-muted">No personal banner uploaded yet.</div>
                        @endif
                        <form method="POST" action="{{ route('updateBanner') }}" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <label class="form-label">Upload New Banner</label>
                            <input type="file" name="banner" class="form-control" accept="image/jpeg,image/png,image/webp" required>
                            <div class="form-text">JPG, JPEG, PNG, WEBP up to 5MB.</div>
                            <button class="btn btn-success mt-2" type="submit">Save Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
