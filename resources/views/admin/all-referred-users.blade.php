@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">All Referred Users</h3>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
                <div class="card-body">
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Total Referred Users</h5>
                                            <h2 class="mb-0">{{ $totalReferredUsers }}</h2>
                                        </div>
                                        <div class="text-white-50">
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Active Referrers</h5>
                                            <h2 class="mb-0">{{ $totalReferrers }}</h2>
                                        </div>
                                        <div class="text-white-50">
                                            <i class="fas fa-user-friends fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Avg Referrals</h5>
                                            <h2 class="mb-0">{{ $avgReferralsPerUser }}</h2>
                                        </div>
                                        <div class="text-white-50">
                                            <i class="fas fa-chart-line fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Referred Users Table -->
                    <div class="table-responsive">
                        <table id="allReferredUsersTable" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th>Referred User Name</th>
                                    <th>Referred User Email</th>
                                    <th>Referred User Phone</th>
                                    <th>Referrer Name</th>
                                    <th>Referrer Email</th>
                                    <th>Referred Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allReferredUsers as $referredUser)
                                <tr>
                                    <!--<td>{{ $referredUser->id }}</td>-->
                                    <td>{{ $referredUser->name }}</td>
                                    <td>{{ $referredUser->email }}</td>
                                     <td>{{ $referredUser->phone }}</td>
                                    <td>
                                        @if($referredUser->referrer)
                                        {{ $referredUser->referrer->name }}
                                        @else
                                        <span class="text-muted">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($referredUser->referrer)
                                        {{ $referredUser->referrer->email }}
                                        @else
                                        <span class="text-muted">Unknown</span>
                                        @endif
                                    </td>
                                    <!--<td>-->
                                    <!--    @if($referredUser->referrer)-->
                                    <!--    <code>{{ $referredUser->referrer->referral_link }}</code>-->
                                    <!--    @else-->
                                    <!--    <span class="text-muted">N/A</span>-->
                                    <!--    @endif-->
                                    <!--</td>-->
                                    <td>{{ $referredUser->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <a href="https://wa.me/234{{ substr($referredUser->phone, 1)}}" class="btn btn-success btn-sm">Message User</a>
                                        <a href="{{ config('app.base_url') }}/admin/delete-referred-user/{{ $referredUser->id }}" class="btn btn-danger btn-sm "
                                            
                                            onclick="return confirm('Are you sure you want to delete {{ $referredUser->name }}?');">
                                            <i class="fas fa-trash"></i> Delete
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
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.copy.min.js"></script>

<script>
    $(document).ready(function() {
        $('#allReferredUsersTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export to Excel',
                    className: 'btn btn-success btn-sm',
                    title: 'All Referred Users - ' + new Date().toISOString().split('T')[0],
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Export all columns except Actions
                    }
                },
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5] // Copy all columns except Actions
                    }
                }
            ],
            responsive: true,
            pageLength: 25,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            order: [
                [6, 'desc']
            ], // Sort by referred date (newest first)
            columnDefs: [{
                targets: 5, // Referred Date column
                type: "date"
            }],
            language: {
                search: "Search referred users:",
                lengthMenu: "Show _MENU_ referred users per page",
                info: "Showing _START_ to _END_ of _TOTAL_ referred users",
                infoEmpty: "No referred users found",
                infoFiltered: "(filtered from _MAX_ total referred users)",
                zeroRecords: "No matching referred users found",
                emptyTable: "No referred users available"
            }
        });

        // Handle delete button clicks
        $(document).on('click', '.delete-btn', function() {
            const userId = $(this).data('id');
            const userName = $(this).data('name');
            const row = $(this).closest('tr');

            if (confirm(`Are you sure you want to delete referred user "${userName}"? This action cannot be undone.`)) {
                $.ajax({
                    url: `/admin/referred-users/${userId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove row from DataTable
                            table.row(row).remove().draw();

                            // Show success message
                            alert('Referred user deleted successfully!');

                            // Optionally reload the page to update statistics
                            location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error deleting referred user. Please try again.');
                    }
                });
            }
        });
    });
</script>
@endpush
