@extends('layouts.app')

@section('content')
<!-- Load Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<!-- Load Google Fonts for better typography -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    body { background: linear-gradient(135deg, #FDFDFC 0%, #f2f5ff 100%); min-height: 100vh; padding: 24px 12px; font-family: 'Inter', sans-serif; color: #1f2937; }

    .container { max-width: 1050px; margin: 0 auto; }

    .card { border: none; border-radius: 18px; box-shadow: 0 8px 28px rgba(18, 112, 248, 0.12); background: #fff; overflow: hidden; transition: transform .25s ease, box-shadow .25s ease; }

    .card:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(18, 112, 248, 0.18); }

    .card-header { background: linear-gradient(135deg, #1270F8 0%, #003380 100%); color: #fff; font-weight: 600; padding: 1.25rem; border-radius: 18px 18px 0 0; font-size: 1.1rem; display: flex; justify-content: space-between; align-items: center; }

    .card-body { padding: 1.5rem; }

    .referral-link-container { margin-bottom: 1.25rem; background: #f8fbff; padding: 1rem; border-radius: 14px; border: 1px solid #e6efff; transition: transform .25s ease, box-shadow .25s ease; }

    .referral-link-container:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(18,112,248,0.12); }

    .form-label { font-weight: 600; color: #0f172a; margin-top: .25rem; margin-bottom: .5rem !important; display: block; font-size: .95rem; }

    .form-control { border-radius: 12px; border: 1px solid #dbe7ff; padding: 10px; font-size: .95rem; transition: all .25s ease; background: #fff; width: 100%; }

    .form-control:focus { border-color: #1270F8; box-shadow: 0 0 0 4px rgba(18,112,248,.12); outline: none; }

    .input-group { display: flex; gap: 10px; flex-wrap: wrap; }

    .btn { border-radius: 12px; padding: 9px 16px; font-weight: 600; font-size: .9rem; transition: all .2s ease; touch-action: manipulation; }

    .btn-success { background: linear-gradient(135deg,#1bb973,#09914f); color: #fff; border: none; }

    .btn-success:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(27,185,115,.35); }

    .btn-copy { background: linear-gradient(135deg,#1270F8,#003380); color: #fff; border: none; }

    .btn-copy:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(18,112,248,.35); }

    .btn-message { background: #38a169; color: #fff; border: none; padding: 6px 12px; font-size: .85rem; }

    .btn-message:hover { transform: translateY(-2px); }

    .btn-danger { background: linear-gradient(135deg,#f53b57,#c82136); color: #fff; border: none; padding: 6px 12px; font-size: .85rem; }

    .btn-danger:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(245,59,87,.35); }

    .table { background: #fff; border-radius: 14px; overflow: hidden; margin-top: 1rem; font-size: .9rem; }

    .table thead th { background: linear-gradient(135deg, #f5f9ff, #eef6ff); color: #0f172a; font-weight: 700; border-bottom: 2px solid #e6efff; padding: .8rem; }

    .table tbody tr { transition: background .2s ease; }

    .table tbody tr:hover { background: #f8fbff; }

    .alert-success { background: linear-gradient(135deg,#e7fff4,#d6fff0); border: 1px solid #b2f5ea; color: #0f5132; border-radius: 12px; padding: .8rem; margin-bottom: 1rem; font-size: .9rem; }

    .section-title { font-weight: 700; color: #0f172a; margin-bottom: .75rem; }

    .stat-card { background: linear-gradient(135deg,#ffffff,#f6f9ff); border: 1px solid #e6efff; border-radius: 14px; padding: 16px; box-shadow: 0 8px 22px rgba(18,112,248,.08); transition: transform .2s ease, box-shadow .2s ease; }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(18,112,248,.12); }
    .stat-number { font-size: 2rem; font-weight: 800; color: #003380; }
    .stat-label { font-size: .85rem; color: #64748b; letter-spacing: .5px; text-transform: uppercase; }

    .link-card { display: flex; gap: 12px; align-items: center; justify-content: space-between; }

    .banner-img { max-height: 240px; object-fit: cover; width: 100%; border-radius: 12px; border: 1px solid #e6efff; }

    /* Mobile-specific styles */
    @media (max-width: 768px) {
        body { padding: 15px 10px; }

        .container { max-width: 100%; }

        .card { margin: 0; border-radius: 14px; }

        .card-header { flex-direction: column; gap: 12px; padding: .9rem; font-size: 1rem; }

        .card-body { padding: 1rem; }

        .referral-link-container { padding: .8rem; margin-bottom: 1rem; }

        .input-group { flex-direction: column; }

        .input-group .form-control, .input-group .btn { width: 100%; margin-top: 8px; }

        .input-group .btn { padding: 10px; font-size: .9rem; }

        .form-control { font-size: .85rem; padding: 8px; }

        .form-label { font-size: .85rem; }

        .link-card { flex-direction: column; text-align: center; gap: 10px; }

        .table-responsive { border-radius: 12px; overflow-x: auto; }

        .table { font-size: .85rem; }

        .table thead th { padding: .6rem; }

        .table tbody td { padding: .6rem; }
    }

    @media (max-width: 576px) {
        .card-header { font-size: .95rem; }
        .btn { font-size: .85rem; padding: 8px 12px; }
        .alert-success { font-size: .85rem; padding: .5rem; }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span>{{ $user->name ?? '' }} {{ __('Dashboard') }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button onclick="return confirm('Are you sure you want to logout?')" type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <div class="stat-card text-center">
                                <div class="stat-number">{{ $referred_count }}</div>
                                <div class="stat-label">Total Referrals</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <div class="stat-card text-center">
                                <div class="stat-number">{{ auth()->user()->created_at ? auth()->user()->created_at->format('M Y') : '—' }}</div>
                                <div class="stat-label">Member Since</div>
                            </div>
                        </div>
                    </div>

                    <div class="referral-link-container">
                        <span class="section-title">Referrals per Month</span>
                        <canvas id="referralsChart" height="120"></canvas>
                    </div>

                    <div class="referral-link-container">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="section-title">Your Landing Page</span>
                            <span class="text-danger">For new users to register</span>
                        </div>
                        <div class="link-card">
                            <div class="input-group">
                                <input id="referral-link" type="text" class="form-control" value="{{ config('app.base_url') }}/{{ auth()->user()->referral_link ?? '' }}" readonly>
                            </div>
                            <button class="btn btn-copy" type="button" onclick="copyReferralLink()">Copy</button>
                        </div>
                    </div>

                    <div class="referral-link-container">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="section-title">Your Tutorial Page Link</span>
                        </div>
                        <div class="link-card">
                            <a href="{{ config('app.base_url') }}/nextstep/{{ auth()->user()->referral_link }}"
                               id="tutorialLink"
                               class="text-blue-600 hover:underline">
                                {{ config('app.base_url') }}/nextstep/{{ auth()->user()->referral_link }}
                            </a>
                            <button onclick="copyTutorialLink()" class="btn btn-copy" title="Copy to clipboard">
                                <i class="fa fa-copy fa-lg"></i>
                            </button>
                        </div>
                    </div>

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
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <span class="section-title">Your Referral Page Banner</span>
                                @if($userBanner)
                                    <img src="{{ $userBanner }}" alt="Your Banner" class="banner-img">
                                @else
                                    <div class="text-muted">No personal banner uploaded yet.</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('updateBanner') }}" enctype="multipart/form-data">
                                    @csrf
                                    <label class="form-label">Upload New Banner</label>
                                    <input type="file" name="banner" class="form-control" accept="image/jpeg,image/png,image/webp" required>
                                    <div class="form-text">JPG, JPEG, PNG, WEBP up to 5MB.</div>
                                    <button class="btn btn-success mt-2" type="submit">Save Banner</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="referral-link-container">
                        <span class="section-title">Your Referral Settings</span>
                       
                        <form method="POST" action="{{ route('updateRefLink') }}">@csrf
                        <label for="registration-link" class="form-label">{{ __('Your CapitalX Referral Link') }}</label>
                            <div class="input-group">
                                 
                                <input name="registration_link" id="registration-link" type="text" class="form-control" value="{{ auth()->user()->registration_link ?? (config('app.base_url').'/register') }}">
                                
                                
                            </div>
                             <label for="registration-link" class="form-label">{{ __('Your Whatsapp Group Link') }}</label>
                            <div class="input-group">
                                
                                <input name="whatsapp" id="whatsapp-link" type="text" class="form-control" value="{{ auth()->user()->whatsapp ?? 'https://wa.me' }}">
                            </div>
                              <label for="registration-link" class="form-label">{{ __('Your Phone Number') }}</label>
                            <div class="input-group">
                                
                                <input name="phone" id="phone" placeholder='08000000000' type="text" class="form-control" value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="input-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                            
                        </form>
                    </div>

                    <div class="referral-link-container">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="section-title">Manage Referrals</span>
                            <a href="{{ route('user.referrals') }}" class="btn btn-copy">Open Referrals Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
    const ctx = document.getElementById('referralsChart');
    if (ctx) {
        const data = {
            labels: <?php echo json_encode($chart_labels); ?>,
            datasets: [{
                label: 'Referrals',
                data: <?php echo json_encode($chart_series); ?>,
                backgroundColor: 'rgba(18, 112, 248, 0.35)',
                borderColor: '#1270F8',
                borderWidth: 2,
                borderRadius: 6,
            }]
        };
        new Chart(ctx, {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }

    function copyReferralLink() {
        const copyText = document.getElementById("referral-link");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value).then(() => {
            alert("Referral link copied!");
        }).catch(err => {
            console.error('Copy failed', err);
        });
    }

    function copyTutorialLink() {
        const link = document.getElementById('tutorialLink').href;
        navigator.clipboard.writeText(link).then(() => {
            alert('Tutorial link copied to clipboard!');
        }).catch(err => {
            console.error('Copy failed', err);
        });
    }
</script>
@endsection
