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
                    <h5 class="card-title">Edit Event</h5>
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
                    <form class="row g-3" action="{{ route('admin.updateEvent') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputNanme4" name="name" required>
                        </div> --}}
                        <input type="hidden" value="{{ $event->id }}" name="id">
                        <div class="col-12">
                            <label for="eventTitleIp" class="form-label">Title</label>
                            <input type="text" class="form-control" id="eventTitleIp" name="title"
                                placeholder="Enter Title" value="{{ $event->title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="eventDescIp" class="form-label">Description</label>
                            <input type="text" class="form-control" id="eventDescIp" name="description"
                                placeholder="Enter Description" value="{{ $event->description }}" required>
                        </div>
                        <div class="col-12">
                            <label for="eventDateIp" class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDateIp" name="date"
                                placeholder="Select Date" value="{{ $event->date }}" required>
                        </div>
                        <div class="col-12">
                            <label for="eventCityIp" class="form-label">City</label>
                            <input type="text" class="form-control" id="eventCityIp" name="city"
                                placeholder="Enter City" value="{{ $event->city }}" required>
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