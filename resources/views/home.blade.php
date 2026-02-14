@extends('layouts.app')

@section('content')
<!-- Load Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<!-- Load Google Fonts for better typography -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 20px 10px;
        font-family: 'Inter', sans-serif;
        color: #2d3748;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, #4a5568, #2d3748);
        color: #ffffff;
        text-align: center;
        font-weight: 600;
        padding: 1rem;
        border-radius: 16px 16px 0 0;
        font-size: 1.1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        padding: 1.5rem;
    }

    .referral-link-container {
        margin-bottom: 1.5rem;
        background: #f7fafc;
        padding: 1rem;
        border-radius: 12px;
        transition: transform 0.3s ease;
    }

    .referral-link-container:hover {
        transform: translateY(-3px);
    }

    .form-label {
        font-weight: 500;
        color: #4a5568;
        margin-top: 0.5rem;
        margin-bottom :0em !important;
        display: block;
        font-size: 0.9rem;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 10px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: #fff;
        width: 100%;
    }

    .form-control:focus {
        border-color: #3182ce;
        box-shadow: 0 0 10px rgba(49, 130, 206, 0.2);
        outline: none;
    }

    .input-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn {
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        touch-action: manipulation;
    }

    .btn-success {
        background: #38a169;
        color: white;
        border: none;
    }

    .btn-success:hover {
        background: #2f855a;
        transform: translateY(-2px);
    }

    .btn-copy {
        background: #3182ce;
        color: white;
        border: none;
    }

    .btn-copy:hover {
        background: #2b6cb0;
        transform: translateY(-2px);
    }

    .btn-message {
        background: #38a169;
        color: white;
        border: none;
        padding: 6px 12px;
        font-size: 0.8rem;
    }

    .btn-message:hover {
        background: #2f855a;
        transform: translateY(-2px);
    }

    .btn-danger {
        background: #e53e3e;
        color: white;
        border: none;
        padding: 6px 12px;
        font-size: 0.8rem;
    }

    .btn-danger:hover {
        background: #c53030;
        transform: translateY(-2px);
    }

    .table {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 1rem;
        font-size: 0.85rem;
    }

    .table thead th {
        background: #edf2f7;
        color: #2d3748;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 0.75rem;
    }

    .table tbody tr {
        transition: background 0.2s ease;
    }

    .table tbody tr:hover {
        background: #f7fafc;
    }

    .alert-success {
        background: #e6fffa;
        border: 1px solid #b2f5ea;
        color: #2c7a7b;
        border-radius: 10px;
        padding: 0.75rem;
        margin-bottom: 1rem;
        font-size: 0.85rem;
    }

    .tutorial-link-box {
        background: #edf2f7;
        padding: 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
        flex-wrap: wrap;
    }

    .tutorial-link-box:hover {
        transform: translateY(-3px);
    }

    .tutorial-link-box a {
        color: #3182ce;
        text-decoration: none;
        font-weight: 500;
        word-break: break-all;
    }

    .tutorial-link-box a:hover {
        color: #2b6cb0;
        text-decoration: underline;
    }

    /* Mobile-specific styles */
    @media (max-width: 768px) {
        body {
            padding: 15px 10px;
        }

        .container {
            max-width: 100%;
        }

        .card {
            margin: 0;
            border-radius: 12px;
        }

        .card-header {
            flex-direction: column;
            gap: 12px;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .card-body {
            padding: 1rem;
        }

        .referral-link-container {
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        .input-group {
            flex-direction: column;
        }

        .input-group .form-control,
        .input-group .btn {
            width: 100%;
            margin-top: 8px;
        }

        .input-group .btn {
            padding: 10px;
            font-size: 0.9rem;
        }

        .form-control {
            font-size: 0.85rem;
            padding: 8px;
        }

        .form-label {
            font-size: 0.85rem;
        }

        .tutorial-link-box {
            flex-direction: column;
            text-align: center;
            gap: 10px;
            padding: 0.75rem;
        }

        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
        }

        .table {
            font-size: 0.8rem;
        }

        .table thead th {
            padding: 0.5rem;
        }

        .table tbody td {
            padding: 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .card-header {
            font-size: 0.95rem;
        }

        .btn {
            font-size: 0.8rem;
            padding: 8px 12px;
        }

        .alert-success {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        .tutorial-link-box a {
            postęp: 0.85rem;
        }
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

                    <div class="referral-link-container">
                        <label for="referral-link" class="form-label">{{ __('Your Landing Page') }} <span class="text-danger">{{ __('- For new users to register') }}</span></label>
                        <div class="input-group">
                            <input id="referral-link" type="text" class="form-control" value="https://www.capitalxtendfx.com/gettingstarted/{{ auth()->user()->referral_link ?? '' }}" readonly>
                            <button class="btn btn-copy" type="button" onclick="copyReferralLink()">Copy</button>
                        </div>
                    </div>

                    <div class="tutorial-link-box">
                        <div>
                            <span class="font-semibold">{{ __('Your Tutorial Page Link') }}:</span><br>
                            <a href="https://www.capitalxtendfx.com/gettingstarted/nextstep/{{ auth()->user()->referral_link }}"
                               id="tutorialLink"
                               class="text-blue-600 hover:underline">
                                https://www.capitalxtendfx.com/gettingstarted/nextstep/{{ auth()->user()->referral_link }}
                            </a>
                        </div>
                        <button onclick="copyTutorialLink()" class="btn btn-copy" title="Copy to clipboard">
                            <i class="fa fa-copy fa-lg"></i>
                        </button>
                    </div>

                    <div class="referral-link-container">
                       
                        <form method="POST" action="{{ route('updateRefLink') }}">@csrf
                        <label for="registration-link" class="form-label">{{ __('Your CapitalX Referral Link') }}</label>
                            <div class="input-group">
                                 
                                <input name="registration_link" id="registration-link" type="text" class="form-control" value="{{ auth()->user()->registration_link ?? 'https://www.capitalxtendfx.com/register' }}">
                                
                                
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

                    <div class="table-responsive">
                        <table id="referralsTable" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referred_users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="https://wa.me/234{{ substr($user->phone, 1) }}" class="btn btn-message">
                                            {{ __('Message') }}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

<script>
    $(document).ready(function() {
        $('#referralsTable').DataTable({
            pageLength: 10,
            lengthChange: false,
            searching: true,
            ordering: false,
            info: false,
            language: {
                search: "",
                searchPlaceholder: "Search referrals..."
            },
            responsive: true
        });
    });

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