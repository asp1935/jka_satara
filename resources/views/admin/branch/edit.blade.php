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
                    <h3 class="card-title">Edit Branch</h3>

                    <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Branch Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
                        </div>

                        <div class="row mt-2 mb-3">
                            <div class="col-md-6 col-12">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{ $branch->contact }}">
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="established" class="form-label">Established</label>
                                <input type="text" name="established" class="form-control"
                                    value="{{ $branch->established }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update Branch</button>
                        <a href="{{ route('branch.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection