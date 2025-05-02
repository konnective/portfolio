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
                        <h4 class="card-title">{{$pageTitle}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.password.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">App Name</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="title" value="{{$item->title}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Password</label>
                                                <input type="password" id="first-name-vertical" class="form-control" name="password" value="{{$item->password}}"><button class="toggle-btn" onclick="toggleVisibility()">👁️</button>
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
