@extends('admin.partials.layout')
@section('content')
    <style>
        .ck-content {
            height: 50vh;
        }
    </style>
    <div class="page-heading">
        <h3>{{$pageHeading}}</h3>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">{{$pageTitle}}</h3>
                    </div>
                    <div class="card-body">
                        <form id="ajax-form" class="modal-form" action="{{ route('admin.content.update') }}" method="POST"
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
                            <input type="text" name="post_id" value="{{ $record->id}}" hidden>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$record->title}}" id="title" required>
                                <div class="invalid-feedback">
                                    Please provide a title for your blog post.
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="topic" class="form-label">Topic</label>
                                    <select class="form-select" name="topic_id" id="topic" required>
                                        <option value="">Choose a topic...</option>
                                        @foreach ($topics as $item)
                                        <option value="{{ $item->id }}" {{$item->id == $record->topic_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Featured Image -->
                            {{-- <div class="mb-3">
                                <label for="featuredImage" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" name="featuredImage" id="featuredImage"
                                    accept="image/*">
                            </div> --}}

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="details" id="details" rows="6" required>{{$record->details}}</textarea>
                                <div class="invalid-feedback">
                                    Please write some content for your blog post.
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
