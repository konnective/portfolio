@extends('admin.partials.layout')
@section('content')
    <div class="page-heading">
        <h3>{{$pageHeading}}</h3>
    </div>
    <section class="section">
        <div class="container-fluid mt-4">
            <!-- Action Bar -->
            <div class="row mb-3">
                <div class="col">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-danger" id="deleteSelected" disabled>
                            <i class="bi bi-trash"></i> Delete Selected
                        </button>
                        <button type="button" class="btn btn-success" id="publishSelected" disabled>
                            <i class="bi bi-check-circle"></i> Publish Selected
                        </button>
                        <button type="button" class="btn btn-warning" id="draftSelected" disabled>
                            <i class="bi bi-file-earmark"></i> Move to Draft
                        </button>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search posts..." id="searchInput">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <a href="{{ route('admin.product.create') }}">
                        <button type="button" class="btn btn-info" id="deleteSelected">
                            <i class="bi bi-plus"></i> Add Product
                        </button>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('admin.cat.create') }}">
                        <button type="button" class="btn btn-info" id="deleteSelected">
                            <i class="bi bi-plus"></i> Add Product Category
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Featured Image</th>
                            <th>Meta Description</th>
                            <th>Status</th>
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
                                <td>{{ $item->name }}</td>

                                <td>{{ $item->category?->name }}</td>

                                <td><img src="{{$item->image}}" alt="thumbnail" class="img-thumbnail"
                                    style="width: 50px;"></td>

                                <td class="text-truncate" style="max-width: 200px;">Learn the basics of Bootstrap 5
                                    framework...</td>

                                <td><span class="badge bg-success">{{ $item->status }}</span></td>

                                <td>{{ $item->formatDate($item->created_at) }}</td>

                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.product.edit', $item->id) }}">
                                            <button class="btn btn-outline-primary p-3"><i class="bi bi-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-outline-danger delete-pro-btn ms-2 p-3" data-id={{$item->id}}><i
                                                class="bi bi-trash"></i></button>
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
    @include('admin.partials.ajax-form')
    @include('admin.partials.delete-modal')
    @include('admin.partials.multi-select')

    <script>
        "use strict";

        function openDeleteModal(productId) {
            $('.product_id').val(productId);
            $('.deleteTaskModal').modal('show');
        }
        $('.delete-pro-btn').on('click', function() {
            const productId = $(this).data('id');
            console.log(productId);
            openDeleteModal(productId);
        });
    </script>
@endsection
