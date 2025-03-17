@extends('admin.partials.layout')
@section('content')
    <div class="page-heading">
        <h3>Contents</h3>
    </div>
    <section class="section">
        <div class="container-fluid mt-4">
            <!-- Action Bar -->
            <div class="row mb-3">
                <div class="col">
                   
                </div>
                
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search posts..." id="searchInput">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <a href="{{route('admin.content.create')}}">
                        <button type="button" class="btn btn-info" id="deleteSelected" >
                                <i class="bi bi-plus"></i> Add Content
                        </button>
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{route('admin.topic.subject')}}">
                        <button type="button" class="btn btn-info" id="deleteSelected" >
                                <i class="bi bi-plus"></i> Add Subject
                        </button>
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <input type="checkbox" class="form-check-input" id="selectAll">
                            </th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample rows -->
                        @forelse ($posts as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input post-checkbox">
                                </td>
                                <td>{{$item->title}}</td>

                                <td>{{$item->topic ? $item->topic : 'Empty'}}</td>
                               
                                <td>{{$item->formatDate($item->created_at)}}</td>

                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('admin.content.edit',$item->id)}}">
                                            <button class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>  
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fas fa-exclamation-circle"></i> No posts found. 
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('selectAll');
        const postCheckboxes = document.querySelectorAll('.post-checkbox');
        const actionButtons = document.querySelectorAll('#deleteSelected, #publishSelected, #draftSelected');

        // Select All functionality
        selectAll.addEventListener('change', function() {
            postCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateActionButtons();
        });

        // Individual checkbox functionality
        postCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(postCheckboxes).every(cb => cb.checked);
                const anyChecked = Array.from(postCheckboxes).some(cb => cb.checked);
                selectAll.checked = allChecked;
                updateActionButtons();
            });
        });

        // Update action buttons state
        function updateActionButtons() {
            const anyChecked = Array.from(postCheckboxes).some(cb => cb.checked);
            actionButtons.forEach(button => {
                button.disabled = !anyChecked;
            });
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    });
</script>
