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
                    <h3 class="card-title">Add Sub Branch</h3>

                    <form action="{{ route('sub_branch.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Select Branch</label>
                            <select name="branch_id" class="form-control" required>
                                <option value="">-- Select Branch --</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Branch Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Add Sub Branch</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection