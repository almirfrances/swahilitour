@extends('admin.layouts.admin')

@section('title', 'Email Campaigns')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Email Campaign Management</h4>
    <p>Manage your email campaigns here. You can create new campaigns or resend existing ones.</p>
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <a href="{{ route('admin.emails.create') }}" class="btn btn-primary w-100">Create New Campaign</a>
                </div>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-12 col-md-6 ms-auto">
                            <form action="{{ route('admin.emails.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control me-2" placeholder="Search campaigns..." value="{{ request()->get('search') }}">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="email-campaigns-table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Sent Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->id }}</td>
                        <td>{{ $campaign->subject }}</td>
                        <td>{{ Str::limit($campaign->content, 50) }}</td>
                        <td>{{ $campaign->created_at->toFormattedDateString() }}</td>
                        <td class="text-center">
                            <button class="btn btn-primary" onclick="resendCampaign({{ $campaign->id }})">Resend</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($campaigns->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No campaigns found</h5>
                </div>
            @endif
            <div class="d-flex justify-content-center mt-4">
                {{ $campaigns->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Resend Email Modal --}}
<div class="modal fade" id="resendEmailModal" tabindex="-1" aria-labelledby="resendEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resendEmailModalLabel">Resend Email Campaign</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="resendForm" action="" method="POST">
                @csrf
                <input type="hidden" id="campaignId" name="campaignId">
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="users" name="recipient_types[]" value="users" checked>
                        <label class="form-check-label" for="users">All Users</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="subscribers" name="recipient_types[]" value="subscribers" checked>
                        <label class="form-check-label" for="subscribers">All Subscribers</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Resend Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function resendCampaign(campaignId) {
        document.getElementById('campaignId').value = campaignId;
        document.getElementById('resendForm').action = `/admin/emails/resend/${campaignId}`;
        $('#resendEmailModal').modal('show');
    }
    </script>



@endsection
