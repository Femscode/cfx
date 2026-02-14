@extends('layouts.app')
@section('content')
<style>
.card { border: none; border-radius: 14px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
.card-header { background: #0f172a; color: #fff; border-radius: 14px 14px 0 0; }
.form-label { font-weight: 600; }
.banner-img { max-height: 240px; object-fit: cover; width: 100%; border-radius: 12px; border: 1px solid #e6efff; }
</style>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Manage User</span>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm">Back to Dashboard</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <div class="fw-bold">{{ $user->name }}</div>
                        <div class="text-muted">{{ $user->email }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="mb-2 fw-semibold">Details</div>
                            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                @csrf
                                <label class="form-label">Phone</label>
                                <input name="phone" type="text" class="form-control" value="{{ $user->phone }}">
                                <label class="form-label mt-3">WhatsApp Group Link</label>
                                <input name="whatsapp" type="text" class="form-control" value="{{ $user->whatsapp }}">
                                <label class="form-label mt-3">Registration Link</label>
                                <input name="registration_link" type="text" class="form-control" value="{{ $user->registration_link }}">
                                <button class="btn btn-success mt-3" type="submit">Save Changes</button>
                            </form>
                        </div>
                        <div class="col-md-6 mb-4">
                            @php
                                $userBanner = null;
                                foreach (['jpg','jpeg','png','webp'] as $ext) {
                                    $candidate = public_path('assets/images/user-banners/' . ($user->id) . '.' . $ext);
                                    if (file_exists($candidate)) {
                                        $userBanner = config('app.base_url').'/public/assets/images/user-banners/' . $user->id . '.' . $ext;
                                        break;
                                    }
                                }
                            @endphp
                            <div class="mb-2 fw-semibold">Referral Banner</div>
                            @if($userBanner)
                                <img src="{{ $userBanner }}" class="banner-img" alt="User Banner">
                            @else
                                <div class="text-muted">No personal banner uploaded.</div>
                            @endif
                            <form method="POST" action="{{ route('admin.users.update-banner', $user->id) }}" enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <label class="form-label">Upload New Banner</label>
                                <input type="file" name="banner" class="form-control" accept="image/jpeg,image/png,image/webp" required>
                                <div class="form-text">Allowed: JPG, JPEG, PNG, WEBP up to 5MB.</div>
                                <button class="btn btn-success mt-2" type="submit">Save Banner</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
