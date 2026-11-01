@extends('admin.layouts.admin')

@section('title', 'Manage FAQs')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">FAQ Management</h4>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFaqModal">Add New FAQ</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ \Illuminate\Support\Str::words($faq->answer, 30, '...') }}</td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#editFaqModal-{{ $faq->id }}"><i
                                                class="ti ti-pencil me-2"></i>Edit</a>

                                    </li>


                                    <li>

                                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Are you sure you want to delete this faq?')"><i
                                                class="ti ti-trash me-2"></i>Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $faqs->links() }}
        </div>
    </div>

    <!-- Add FAQ Modal -->
    <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFaqModalLabel">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.faqs.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea class="form-control" id="answer" name="answer" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit FAQ Modal -->
    @foreach ($faqs as $faq)
    <div class="modal fade" id="editFaqModal-{{ $faq->id }}" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question-{{ $faq->id }}" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question-{{ $faq->id }}" name="question" value="{{ $faq->question }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer-{{ $faq->id }}" class="form-label">Answer</label>
                            <textarea class="form-control" id="answer-{{ $faq->id }}" name="answer">{{ $faq->answer }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
