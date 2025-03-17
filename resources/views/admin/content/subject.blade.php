@extends('admin.partials.layout')
@section('content')
    <style>
        .ck-content {
            height: 50vh;
        }
    </style>
    <div class="page-heading">
        <h3>Subject And Topic</h3>
    </div>
    {{-- <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Create New Content Post</h3>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subject Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.subject.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="name" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Details</label>
                                                <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Topic Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.topic.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="name" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Subject</label>
                                                <select class="form-select" name="subject_id" id="subject" required>
                                                    <option value="">Choose a subject...</option>
                                                    @foreach ($subjects as $item)
                                                        <option value="{{ $item->id }}" {{ old('subject_id') == $item->id ? 'selected' : ''; }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Details</label>
                                                <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
