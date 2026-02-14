@extends('layouts.app')

@section('content')
<style>
    .admin-dashboard { background: #f5f7fb; min-height: 100vh; padding: 24px 0; }
    
    .stats-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 6px 18px rgba(18, 112, 248, 0.12); margin-bottom: 16px; border: 1px solid #e6efff; }
    
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(18, 112, 248, 0.2);
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #003380;
        margin-bottom: 5px;
    }
    
    .stats-label {
        color: #6c757d;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }
    
    .admin-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 51, 128, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
        border: 1px solid rgba(18, 112, 248, 0.1);
    }
    
    .admin-card-header { background: #0f172a; color: #fff; padding: 16px; font-weight: 600; font-size: 1rem; display: flex; align-items: center; justify-content: space-between; }
    
    .admin-card-body {
        padding: 0;
    }
    
    .table {
        margin-bottom: 0;
        font-size: 0.95rem;
    }
    
    .table th {
        background-color: #f8f9fa;
        border-top: none;
        font-weight: 600;
        color: #003380;
        padding: 15px 12px;
        border-bottom: 2px solid #1270F8;
    }
    
    .table td {
        padding: 12px;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
    }
    
    .table tbody tr:hover {
        background-color: rgba(18, 112, 248, 0.05);
    }
    
    .badge-admin {
        background: linear-gradient(135deg, #1270F8, #003380);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .badge-user {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .btn-admin-toggle {
        background: linear-gradient(135deg, #1270F8, #003380);
        border: none;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-admin-toggle:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(18, 112, 248, 0.3);
        color: white;
    }
    
    .btn-view-referrals {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-view-referrals:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        color: white;
    }
    
    .referral-link {
        background: #f8f9fa;
        padding: 6px 10px;
        border-radius: 6px;
        font-family: 'Courier New', monospace;
        font-size: 0.85rem;
        color: #003380;
        border: 1px solid #e9ecef;
    }
    
    .page-title {
        color: white;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .alert-success {
        border-radius: 10px;
        border: none;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-left: 4px solid #155724;
    }
    
    .dt-buttons {
        margin-bottom: 15px;
    }
    
    .dt-button { background: #1270F8 !important; color: white !important; border: none !important; border-radius: 6px !important; padding: 8px 16px !important; font-size: 0.9rem !important; font-weight: 500 !important; margin-right: 8px !important; transition: all 0.2s ease !important; }
    
    .dt-button:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 12px rgba(18, 112, 248, 0.3) !important;
    }
    
    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.8rem;
        }
        
        .stats-number {
            font-size: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .admin-card-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="admin-dashboard">
    <div class="container">
        <h1 class="page-title" style="color:#0f172a; text-shadow:none;">Admin Dashboard</h1>
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card text-center">
                    <div class="stats-number">{{ $totalUsers }}</div>
                    <div class="stats-label">Total Users</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card text-center">
                    <div class="stats-number">{{ $totalReferredUsers }}</div>
                    <div class="stats-label">Referred Users</div>
                    <div class="mt-2">
                        <a href="{{ route('admin.all-referred-users') }}" class="btn btn-sm" style="background: linear-gradient(135deg, #1270F8 0%, #003380 100%); color: white; border-radius: 6px; font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card text-center">
                    <div class="stats-number">{{ $totalAdmins }}</div>
                    <div class="stats-label">Admins</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card text-center">
                    <div class="stats-number">{{ number_format($totalUsers > 0 ? ($totalReferredUsers / $totalUsers) : 0, 1) }}</div>
                    <div class="stats-label">Avg Referrals</div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <i class="fas fa-chart-bar me-2"></i>Monthly Statistics
                </div>
            </div>
            <div class="admin-card-body">
                <div class="row g-0 p-3">
                    <div class="col-md-6 mb-3">
                        <div class="p-3" style="background:#f8f9fa; border-radius:12px;">
                            <div class="mb-2 fw-semibold">Total Users per Month</div>
                            <canvas id="usersPerMonthChart" height="140"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-3" style="background:#f8f9fa; border-radius:12px;">
                            <div class="mb-2 fw-semibold">Total Referred Users per Month</div>
                            <canvas id="referredPerMonthChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $bannerPath = null;
            foreach (['jpg','jpeg','png','webp'] as $ext) {
                $candidate = public_path('assets/images/referral-banner.' . $ext);
                if (file_exists($candidate)) {
                 $bannerPath = config('app.base_url').'/public/assets/images/referral-banner.'.$ext;
                               
                    break;
                }
            }
        @endphp
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <i class="fas fa-image me-2"></i>Referral Page Banner
                </div>
            </div>
            <div class="admin-card-body">
                <div class="row g-0 p-3">
                    <div class="col-md-6 mb-3">
                        <div class="p-3" style="background:#f8f9fa; border-radius:12px;">
                            <div class="mb-2 fw-semibold">Current Banner Preview</div>
                            @if($bannerPath)
                                <img src="{{ $bannerPath }}" alt="Referral Banner" class="img-fluid rounded" style="max-height:260px; object-fit:cover; width:100%;">
                            @else
                                <div class="text-muted">No banner uploaded. Using default image on referral page.</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data" class="p-3">
                            @csrf
                            <div class="mb-3">
                                <label for="banner" class="form-label fw-semibold">Upload New Banner</label>
                                <input type="file" name="banner" id="banner" class="form-control" accept="image/jpeg,image/png,image/webp" required>
                                <div class="form-text">Allowed types: JPG, JPEG, PNG, WEBP. Max 5MB.</div>
                            </div>
                            <button type="submit" class="btn btn-admin-toggle">Save Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Users Table -->
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <i class="fas fa-users me-2"></i>All Registered Users
                </div>
            </div>
            <div class="admin-card-body">
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>WhatsApp</th>
                                <th>Registration Link</th>
                                <th>Referral Link</th>
                                <th>Referred Count</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><strong>{{ $user->id }}</strong></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? 'N/A' }}</td>
                                <td>{{ $user->whatsapp ?? 'N/A' }}</td>
                                <td>
                                    @if($user->registration_link)
                                        <span class="referral-link">{{ Str::limit($user->registration_link, 25) }}</span>
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->referral_link)
                                        <span class="referral-link">{{ $user->referral_link }}</span>
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-primary rounded-pill">{{ $user->referred_users_count }}</span>
                                  
                                </td>
                                <td>
                                    @if($user->is_admin)
                                        <span class="badge-admin">Admin</span>
                                    @else
                                        <span class="badge-user">User</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm" title="View / Manage">
                                            <i class="fas fa-user-cog"></i> Manage
                                        </a>
                                        <a href="{{ route('admin.user-referrals', $user->id) }}" class="btn btn-info btn-sm" title="View Referrals">
                                            <i class="fas fa-users"></i> Referrals
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-admin-toggle btn-sm">
                                                    {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small">Current User</span>
                                        @endif
                                    </div>
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

<!-- Include DataTables with Buttons extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable({
        "pageLength": 25,
        "order": [[ 0, "desc" ]],
        "responsive": true,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel me-1"></i>Export to Excel',
                title: 'Registered Users - ' + new Date().toLocaleDateString(),
                "exportOptions": {
                    "columns": [0, 1, 2, 3, 4, 7, 8, 9] // Exclude registration/referral links and actions
                }
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy me-1"></i>Copy',
                "exportOptions": {
                    "columns": [0, 1, 2, 3, 4, 7, 8, 9]
                }
            }
        ],
        "language": {
            "search": "Search users:",
            "lengthMenu": "Show _MENU_ users per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ users",
            "emptyTable": "No users found",
            "zeroRecords": "No matching users found"
        },
        "columnDefs": [
            { "orderable": false, "targets": [5, 6, 10] }, // Disable sorting for links and actions
            { "className": "text-center", "targets": [0, 7, 8] }, // Center align ID, count, and role columns
            { "type": "date", "targets": [9] } // Ensure proper date sorting for joined column
        ]
    });
});

const monthLabels = <?php echo json_encode($monthLabels ?? []); ?>;
const usersSeries = <?php echo json_encode($usersPerMonth ?? []); ?>;
const referredSeries = <?php echo json_encode($referredPerMonth ?? []); ?>;
const commonOptions = {
    type: 'bar',
    options: {
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
        plugins: { legend: { display: false } }
    }
};
const usersCtx = document.getElementById('usersPerMonthChart');
if (usersCtx && window.Chart) {
    new Chart(usersCtx, {
        ...commonOptions,
        data: {
            labels: monthLabels,
            datasets: [{ data: usersSeries, backgroundColor: 'rgba(18,112,248,.35)', borderColor: '#1270F8', borderWidth: 2, borderRadius: 6 }]
        }
    });
}
const referredCtx = document.getElementById('referredPerMonthChart');
if (referredCtx && window.Chart) {
    new Chart(referredCtx, {
        ...commonOptions,
        data: {
            labels: monthLabels,
            datasets: [{ data: referredSeries, backgroundColor: 'rgba(32,201,151,.35)', borderColor: '#20c997', borderWidth: 2, borderRadius: 6 }]
        }
    });
}
</script>
@endsection
