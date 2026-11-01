{{-- resources/views/admin/menus/index.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Menu Management')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Menu Management</h4>
    <button onclick="openMenuModal()" class="btn btn-primary">Add New Menu</button>


    {{-- resources/views/admin/menus/index.blade.php --}}
<div class="row mt-3">
    @foreach ($menus as $menu)
    <div class="col-md-2 col-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->title }}</h5>
                <p>
                    <span class="badge {{ $menu->position === 'navbar' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($menu->position) }}
                    </span>
                    @if ($menu->position === 'footer')
                        <span class="badge bg-info">{{ ucfirst($menu->category) }}</span>
                    @endif
                </p>
                <button onclick="openMenuModal({{ $menu->id }})" class="btn btn-sm btn-secondary">Edit</button>
                <button onclick="deleteMenu({{ $menu->id }})" class="btn btn-sm btn-danger">Delete</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

    {{-- Modal for Creating/Editing Menus --}}
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModalLabel">Menu Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="menuForm" action="" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="methodInput" value="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="menuId">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required autocomplete="">
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link (optional)</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        {{-- resources/views/admin/menus/index.blade.php --}}
                        <div class="mb-3">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" class="form-control" id="order" name="order" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" onchange="updateMenuType()">
                                <option value="default">Default</option>
                                <option value="dropdown">Dropdown</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-select" id="position" name="position">
                                <option value="navbar">Navbar</option>
                                <option value="footer">Footer</option>
                                <option value="none">None</option>
                            </select>
                        </div>
                        <div class="mb-3" id="categoryField" style="display: none;">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Select a Category</option>
                                <option value="useful_links" {{ $menu->category == 'useful_links' ? 'selected' : '' }}>Useful Links</option>
                                <option value="company" {{ $menu->category == 'company' ? 'selected' : '' }}>Company</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="page_id" class="form-label">Page</label>
                            <select class="form-select" id="page_id" name="page_id" onchange="updateLinkField()">
                                <option value="">Select a Page</option>
                                @foreach ($pages as $page)
                                <option value="{{ $page->id }}" data-slug="{{ $page->slug }}">{{ $page->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3" id="childMenuContainer" style="display: none;">
                            <label for="children" class="form-label">Child Menus</label>
                            <button type="button" class="btn btn-info" onclick="addChildMenu()">Add Child Menu</button>
                            <div id="childMenus">
                                <!-- Child menus will be added here -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateLinkField() {
        const pageSelect = document.getElementById('page_id');
        const linkInput = document.getElementById('link');
        const selectedOption = pageSelect.options[pageSelect.selectedIndex];

        // Check if a page is selected and it has a slug
        if (selectedOption && selectedOption.dataset.slug) {
            linkInput.value = `/${selectedOption.dataset.slug}`; // Update the link field with the slug
        } else {
            linkInput.value = ''; // Reset if no page is selected
        }
    }
    </script>


<script>
    let childIndex = 0; // Global index for child menus

    function deleteMenu(id) {
        if (confirm('Are you sure you want to delete this menu?')) {
            fetch(`/admin/menus/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                window.location.reload();  // Reload the page to update the list
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>
<script>
    function openMenuModal(id = null) {
        const modal = new bootstrap.Modal(document.getElementById('menuModal'));
        const form = document.getElementById('menuForm');
        const methodInput = document.getElementById('methodInput');
        form.reset();

        if (id) {
            form.action = `/admin/menus/${id}/save`;
            methodInput.value = 'PATCH';
            fetch(`/admin/menus/data/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    populateForm(data);
                    modal.show();
                })
                .catch(error => {
                    console.error('Error fetching menu data:', error);
                });
        } else {
            form.action = `/admin/menus/save`;
            methodInput.value = 'POST';
            modal.show();
        }
    }

    function populateForm(data) {
        document.getElementById('menuId').value = data.id;
        document.getElementById('title').value = data.title;
        document.getElementById('link').value = data.link || '';
        document.getElementById('type').value = data.type;
        document.getElementById('position').value = data.position;
        document.getElementById('page_id').value = data.page_id || '';
        document.getElementById('order').value = data.order;
        document.getElementById('category').value = data.category || '';
        const childrenContainer = document.getElementById('childMenus');
        childrenContainer.innerHTML = ''; // Clear previous entries
        childIndex = 0; // Reset child index
        if (data.children && data.children.length > 0) {
            data.children.forEach((child, index) => {
                addChildMenu(child, index);
            });
        }
    }

    function updateMenuType() {
        const type = document.getElementById('type').value;
        const childMenuContainer = document.getElementById('childMenuContainer');
        if (type === 'dropdown') {
            childMenuContainer.style.display = 'block';
        } else {
            childMenuContainer.style.display = 'none';
        }
    }

    function addChildMenu(child = {}, index = -1) {
        const container = document.getElementById('childMenus');
        if (index === -1) {
            index = childIndex++; // Use and increment the global index if no index is provided
        } else {
            childIndex = Math.max(childIndex, index + 1); // Ensure the global index is always ahead
        }
        const title = child.title || '';
        const link = child.link || '';

        const html = `
            <div class="mb-2" id="childMenu-${index}">
                <input type="text" class="form-control mb-1" name="children[${index}][title]" placeholder="Child Menu Title" value="${title}" required>
                <input type="text" class="form-control" name="children[${index}][link]" placeholder="Child Menu Link" value="${link}">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeChildMenu(${index})">Remove</button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function removeChildMenu(index) {
        const childMenu = document.getElementById(`childMenu-${index}`);
        if (childMenu) {
            childMenu.remove();
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const positionSelect = document.getElementById('position');
        const categoryField = document.getElementById('categoryField');

        function toggleCategoryField() {
            // Display the category field only if the position is 'footer'
            categoryField.style.display = positionSelect.value === 'footer' ? 'block' : 'none';
        }

        // Attach the event listener to handle changes in the position dropdown
        positionSelect.addEventListener('change', toggleCategoryField);

        // Function to populate the form and adjust UI based on the data
        function populateForm(data) {
            document.getElementById('menuId').value = data.id;
            document.getElementById('title').value = data.title;
            document.getElementById('link').value = data.link || '';
            document.getElementById('type').value = data.type;
            document.getElementById('position').value = data.position;
            document.getElementById('page_id').value = data.page_id || '';
            document.getElementById('order').value = data.order;
            document.getElementById('category').value = data.category || '';

            // Call toggleCategoryField after setting the position to handle initial display
            toggleCategoryField();
        }

        // Expose populateForm to the global scope to be called from openMenuModal
        window.populateForm = populateForm;

        // Initial call to handle the case when the modal is opened without an ID (new menu)
        toggleCategoryField();
    });
</script>
@endsection
