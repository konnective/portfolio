@extends('admin.partials.layout')
@section('content')
 <style>
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: #f8f9fa;
        min-height: 200px;
    }

    .dz-message {
        font-size: 18px;
        color: #666;
    }

    h1 {
        color: #333;
        margin-bottom: 30px;
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-top: 20px;
        display: none;
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
                        <form  id="image-dropzone" class="modal-form dropzone" action="{{ route('admin.product.upload') }}" method="POST" enctype="multipart/form-data">
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
                       
                            <div class="dz-message">
                                <h3>Drop images here or click to upload</h3>
                                <p>You can upload multiple images at once</p>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    
    <script>
        // Disable auto discover
        Dropzone.autoDiscover = false;

        // Initialize Dropzone
        const myDropzone = new Dropzone("#image-dropzone", {
            url: "{{route('admin.product.upload')}}",
            method: "post",
            paramName: "file",
            maxFilesize: 2, // MB
            maxFiles: 10,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            success: function(file, response) {
                console.log('Upload successful:', response);
                document.getElementById('success-message').style.display = 'block';
                document.getElementById('success-message').textContent = 
                    'Image uploaded successfully: ' + response.filename;
            },
            error: function(file, response) {
                console.error('Upload error:', response);
                alert('Error uploading file: ' + (response.message || 'Unknown error'));
            },
            queuecomplete: function() {
                setTimeout(() => {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            }
        });
    </script>
@endsection
