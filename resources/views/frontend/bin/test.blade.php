@extends('admin.partials.layout')
@section('content')
    came here


    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Upload Button -->
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="images[]" id="imageInput" multiple class="form-control mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Upload</button>
                    </form>

                    <!-- Image Gallery -->
                    <div class="row" id="imageGallery">
                        @foreach ($images as $image)
                            <div class="col-md-3 mb-3 image-card" data-id="{{ $image->id }}">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $image->path) }}" class="img-fluid rounded">
                                    <button class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-image"
                                        data-id="{{ $image->id }}">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
