@extends('dashboard_layout.layout')

@section("meta")
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
<title> Admin || Dashboard </title>
{{-- @section("css")

@endsection

@section("js")

@endsection --}}

@section("pageContent")
    <div class="main-content">


        <main id="main" class="main">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit News</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">

                            <strong>{{ session()->get('success') }} </strong>
                        </div>
                    @endif
                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('admin.updateNews') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputNanme4" name="name" required>
                        </div> --}}
                        <input type="hidden" value="{{ $news->id }}" name="id">
                        <div class="col-12">
                            <label for="newsTitleIp" class="form-label">Title</label>
                            <input type="text" class="form-control" id="newsTitleIp" name="title"
                                placeholder="Enter Title" value="{{ $news->title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="newsDateIp" class="form-label">Date</label>
                                <input type="date" class="form-control" id="newsDateIp" name="date"
                                placeholder="Select Date" value="{{ $news->date }}" required>
                        </div>
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">news Image</label>
                            <input type="file" class="form-control" id="inputNanme4" name="updated_image"
                                accept="image/png, image/jpg, image/jpeg" >
                            <img src="{{ asset('uploads/news_images/' . $news->image) }}" width="150">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>


        </main>
    </div>
@endsection