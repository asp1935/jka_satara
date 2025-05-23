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
                    <h3 class="card-title">All Branches</h3>

                    <a href="{{ route('branch.create') }}" class="btn btn-primary mb-3">+ Add New Branch</a>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Branch Name</th>
                                <th>Contact</th>
                                <th>Established</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($branches)
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->contact }}</td>
                                        <td>{{ $branch->established }}</td>
                                        <td>
                                            <a href="{{ route('branch.edit', $branch->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
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