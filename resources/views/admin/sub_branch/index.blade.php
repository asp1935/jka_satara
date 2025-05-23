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
                    <h3 class="card-title">All Sub Branches</h3>

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('sub_branch.create') }}" class="btn btn-primary">+ Add Sub Branch</a>

                        <div class="col-md-4">
                            <form action="{{ route('sub_branch.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search sub branches..." value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Main Branch</th>
                                <th>Sub Branch</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($subBranches)
                                @forelse($subBranches as $subBranch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subBranch->branch->name }}</td>
                                        <td>{{ $subBranch->name }}</td>
                                        <td>{{ $subBranch->contact }}</td>
                                        <td>{{ $subBranch->address }}</td>
                                        <td>
                                            <a href="{{ route('sub_branch.edit', $subBranch->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('sub_branch.destroy', $subBranch->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this sub branch?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No sub branches found</td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Pagination links -->
    {{ $subBranches->appends(request()->query())->links() }}
    </div>
@endsection