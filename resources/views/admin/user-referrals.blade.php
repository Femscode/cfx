@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #1270F8 0%, #003380 100%); color: white;">
                    <h4 class="mb-0">
                        <i class="fas fa-users me-2"></i>
                        Referred Users by {{ $user->name }}
                    </h4>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Dashboard
                    </a>
                </div>
                <div class="card-body">
                    <!-- User Info Section -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card border-0" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                <div class="card-body">
                                    <h6 class="card-title" style="color: #003380;">Referrer Information</h6>
                                    <p class="mb-1"><strong>Name:</strong> {{ $user->name }}</p>
                                    <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                                    <p class="mb-1"><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
                                    <p class="mb-1"><strong>Referral Link:</strong> {{ $user->referral_link }}</p>
                                    <p class="mb-0"><strong>Total Referrals:</strong> <span class="badge" style="background-color: #1270F8;">{{ $referredUsers->count() }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                <div class="card-body">
                                    <h6 class="card-title" style="color: #003380;">Referral Statistics</h6>
                                    <p class="mb-1"><strong>Member Since:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                                    <p class="mb-1"><strong>Latest Referral:</strong> 
                                        @if($referredUsers->count() > 0)
                                            {{ $referredUsers->first()->created_at->format('M d, Y') }}
                                        @else
                                            No referrals yet
                                        @endif
                                    </p>
                                    <p class="mb-0"><strong>Admin Status:</strong> 
                                        @if($user->is_admin)
                                            <span class="badge bg-success">Admin</span>
                                        @else
                                            <span class="badge bg-secondary">User</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Referred Users Table -->
                    @if($referredUsers->count() > 0)
                        <div class="table-responsive">
                            <table id="referredUsersTable" class="table table-striped table-hover">
                                <thead style="background: linear-gradient(135deg, #1270F8 0%, #003380 100%); color: white;">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Referred Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referredUsers as $index => $referredUser)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $referredUser->name }}</td>
                                            <td>{{ $referredUser->email }}</td>
                                            <td>{{ $referredUser->phone ?? 'N/A' }}</td>
                                            <td>{{ $referredUser->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-users" style="font-size: 4rem; color: #dee2e6;"></i>
                            </div>
                            <h5 class="text-muted">No Referrals Yet</h5>
                            <p class="text-muted">This user hasn't referred anyone yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

<!-- DataTables JS -->
<!-- Only include jQuery if not already included in layouts.app -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

@if($referredUsers->count() > 0)
<script>
$(document).ready(function() {
    // Check if DataTable is already initialized to avoid re-initialization
    if ($.fn.DataTable.isDataTable('#referredUsersTable')) {
        $('#referredUsersTable').DataTable().destroy();
    }

    $('#referredUsersTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel me-1"></i> Export to Excel',
                className: 'btn btn-success btn-sm',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] // Include all visible columns
                },
                title: 'Referred Users by {{ $user->name }}'
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy me-1"></i> Copy',
                className: 'btn btn-secondary btn-sm',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] // Include all visible columns
                }
            }
        ],
        responsive: true,
        pageLength: 25,
        order: [[4, 'desc']], // Sort by "Referred Date" (column index 4)
        columnDefs: [
            {
                targets: [3], // Disable sorting for "Phone" column
                orderable: false
            }
        ]
    });
});
</script>
@endif

<style>
.card {
    border: none;
    border-radius: 12px;
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
    border: none;
}

.table th {
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.table td {
    border-color: #f1f3f4;
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: rgba(18, 112, 248, 0.05);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
}

.badge {
    border-radius: 6px;
    font-weight: 500;
}

.dataTables_wrapper .dataTables_filter input {
    border-radius: 8px;
    border: 1px solid #dee2e6;
    padding: 0.375rem 0.75rem;
}

.dataTables_wrapper .dataTables_length select {
    border-radius: 8px;
    border: 1px solid #dee2e6;
    padding: 0.375rem 0.75rem;
}

.dt-buttons {
    margin-bottom: 1rem;
}

.dt-button {
    margin-right: 0.5rem !important;
    border-radius: 8px !important;
}
</style>
@endsection