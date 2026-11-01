@extends('admin.layouts.admin')

@section('title', 'Create Email Campaign')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Email Campaign</h4>
    <form action="{{ route('admin.emails.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Recipient Selection -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Select Recipients</h5>
            </div>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="users" name="recipient_types[]" value="users">
                    <label class="form-check-label" for="users">All Users</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="subscribers" name="recipient_types[]" value="subscribers">
                    <label class="form-check-label" for="subscribers">All Subscribers</label>
                </div>
                <p class="text-muted mt-4"> Make sure to add this Cron Job in your Cpanel: <code>* * * * * /usr/local/bin/php /home/username/public_html/artisan queue:work --stop-when-empty >/dev/null 2>&1
                </code></p>
            </div>


        </div>

        <!-- Email Content -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Email Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Message</label>
                    <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Add URL Button</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="https://example.com">
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Send Email</button>
        </div>
    </form>
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
@endsection
