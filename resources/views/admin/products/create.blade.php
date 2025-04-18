@extends('admin.partials.layout')
@section('content')
<style>
    .ck-content {
        height: 50vh;
    }
</style>
    <div class="page-heading">
        <h3>{{$module}}</h3>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">{{$pageTitle}}</h3>
                    </div>
                    <div class="card-body">
                        <form  id="ajax-form" class="modal-form" action="{{ route('admin.product.store') }}" method="POST" novalidate>
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
                            <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                    <div class="invalid-feedback">
                                        Please provide a title for your product.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" required>
                                    <div class="invalid-feedback">
                                        Please provide a title for your product.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="stock_quantity" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" required>
                                </div>
                                <div class="col-6">
                                    <label for="discounted_price" class="form-label">Discounted Price</label>
                                    <input type="text" class="form-control" name="discount_price" id="discount_price" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="sku" class="form-label">Sku</label>
                                    <input type="text" class="form-control" name="sku" id="sku" required>
                                </div>
                                <div class="col-12">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" name='image' type="file" id="formFile">
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" id="category" required>
                                        <option value="">Choose a category...</option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a category.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="brand" class="form-label">Brand</label>
                                    <select class="form-select" name="brand_id" id="brand_id" required>
                                        <option value="">Choose a category...</option>
                                        @foreach ($brands as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a category.
                                    </div>
                                </div>
                            </div>
                      

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Content</label>
                                <textarea class="form-control" name="description" id="description" rows="6" required></textarea>
                                <div class="invalid-feedback">
                                    Please write some description for your blog post.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="brand" class="form-label">Save as</label>
                                <select class="form-select" name="status" id="status" required>
                                    <option value="">Choose a category...</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                   
                                </select>
                                <div class="invalid-feedback">
                                    Please select a category.
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
