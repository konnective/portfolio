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
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.cat.store') }}" method="POST" class="form form-vertical">
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
                                                <label for="email-id-vertical">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Status</label>
                                                <select class="form-select" name="status" id="subject" required>
                                                    <option value="">Choose a status...</option>
                                                    <option value="Publish">Publish</option>
                                                    <option value="Draft">Draft</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
