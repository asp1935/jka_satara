@extends('dashboard_layout.layout')
@section("meta")
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
@section('pageContent')
    <div class="main-content">
        <main id="main" class="main">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Gallery Item</h1>
                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $gallery->title }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        required>{{ $gallery->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Current Image</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('uploads/gallery/' . $gallery->image_path) }}"
                                        alt="{{ $gallery->title }}" width="100"
                                        onerror="this.onerror=null; this.src='{{ asset('images/default-image.jpg') }}'">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Change Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="image">
                                    <small>Leave blank to keep current image</small>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Update Item</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </main>
    </div>
@endsection