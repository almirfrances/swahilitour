{{-- resources/views/admin/pages/index.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Manage Pages')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Page Management</h4>
    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <button onclick="openCreateModal()" class="btn btn-primary">Add New Page</button>
            <form action="{{ route('admin.pages.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search pages..." value="{{ request()->get('search') }}">
                <button type="submit" class="btn btn-secondary ms-2">Search</button>
            </form>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="pages-table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->slug }}</td>
                            <td class="text-center">
                                <button onclick="openEditModal({{ $page->id }})" class="btn btn-secondary btn-sm">Edit</button>
                                <button data-page-id="{{ $page->id }}" class="btn btn-danger btn-sm delete-button">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($pages->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No pages found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $pages->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pageModalLabel">Page Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="pageForm" action="" method="POST">
                @csrf
                <input type="hidden" name="_method" id="methodInput" value="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.tiny.cloud/1/a1z8f51pjd0pdtkik9dqrjqkun3l6v1bu6nx0x9tnmo58zmq/tinymce/7/tinymce.min.js" referrerpolicy="origin" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: 'textarea#content',
            plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 9, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'mentions', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',            height: 300
        });
    });
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function openCreateModal() {
        $('#pageModal').modal('show');
        $('#pageForm').attr('action', '{{ route("admin.pages.store") }}');
        $('#pageForm').trigger("reset");
        $('#methodInput').val('POST');
    }

    function openEditModal(pageId) {
        $.get(`/admin/pages/${pageId}/edit`, function(data) {
            $('#name').val(data.name);
            $('#title').val(data.title);
            $('#content').val(data.content);
            $('#pageForm').attr('action', `/admin/pages/${pageId}`);
            $('#methodInput').val('PATCH');
            $('#pageModal').modal('show');
        }).fail(function() {
            alert('Page could not be loaded.');
        });
    }

    $('#pageForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: $('#methodInput').val() === 'POST' ? 'POST' : 'PATCH',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                $('#pageModal').modal('hide');
                alert(response.message);
                location.reload(); // Reload the page to update the list
            }
        });
    });


    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const pageId = this.getAttribute('data-page-id');
                deletePage(pageId);
            });
        });
    });

    window.deletePage = function(pageId) {
        if (confirm('Are you sure you want to delete this page?')) {
            fetch(`/admin/pages/${pageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({})
            })

            .then(data => {
                alert('Page deleted successfully.');
                location.reload();
            })

        }
    };
    </script>
@endsection


