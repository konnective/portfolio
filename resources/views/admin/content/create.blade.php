@extends('admin.partials.layout')
@section('content')
    <style>
        .ck-content {
            height: 50vh;
        }
    </style>
    <div class="page-heading">
        <h3>Blogs</h3>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Create content</h3>
                    </div>
                    <div class="card-body">
                        <form id="ajax-form" class="modal-form" action="{{ route('admin.content.store') }}" method="POST"
                            novalidate>
                            @csrf
                            <!-- Title -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                                <div class="invalid-feedback">
                                    Please provide a title for your blog post.
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="row">
                                <div class="col-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" id="category" required>
                                        <option value="">Choose a category...</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a category.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="category" class="form-label">Subjects</label>
                                    <select class="form-select" name="subject_id" id="category" required>
                                        <option value="">Choose a subject...</option>
                                        @foreach ($subjects as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a category.
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Image -->
                            <div class="mb-3">
                                <label for="featuredImage" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" name="featuredImage" id="featuredImage"
                                    accept="image/*">
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="details" rows="6" required></textarea>
                                <div class="invalid-feedback">
                                    Please write some content for your blog post.
                                </div>
                            </div>

                            <!-- Meta Description -->

                            <!-- Draft/Publish Toggle -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="0" id="publishNow" hidden>
                                    <input class="form-check-input" type="checkbox" id="publishNow">
                                    <label class="form-check-label" for="publishNow">
                                        Publish immediately
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                {{-- <button type="button" class="btn btn-secondary me-md-2">Save as Draft</button> --}}
                                <button type="submit" class="btn btn-primary">Publish Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
