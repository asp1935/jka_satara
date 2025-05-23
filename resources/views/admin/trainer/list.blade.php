@extends('dashboard_layout.layout')
@section("meta")
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
<title> Admin || Dashboard </title>
@section('pageContent')
    <div class="main-content">
        <main id="main" class="main">
            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title">All Trainers</h5>
                    
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('admin.trainer.add') }}" class="btn btn-primary mb-3">+ Add New Trainer</a>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Branch</th>
                                <th>SubBranch</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($trainers)

                                @foreach($trainers as $key => $trainer)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>
                                            <img src="{{ asset('uploads/trainer_images/' . $trainer->image) }}" alt="Gallery Image"
                                                width="100" height="100">
                                        </td>
                                        <td>{{ $trainer->name }}</td>
                                        <td>{{ $trainer->designation }}</td>
                                        <td>{{ $trainer->branch->name ?? 'N/A' }}</td>
                                        <td>{{ $trainer->subBranch->name ?? 'N/A' }}</td>

                                        <td>
                                            <a href="{{ route('admin.trainer.edit', $trainer->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.trainer.delete', $trainer->id) }}"
                                                class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

@endsection