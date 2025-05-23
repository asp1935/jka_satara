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
                    <!-- <div class="container mt-4"> -->
                    <h3 class="card-title">Add Branch</h3>
                    <form action="{{ route('branch.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">Branch Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="row my-2 ">
                            <div class="col-md-6 col-12 ">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" name="contact"
                                    value="{{ old('contact', $branch->contact ?? '') }}">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="established" class="form-label">Established</label>
                                <input type="text" class="form-control" name="established"
                                    value="{{ old('established', $branch->established ?? '') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Branch</button>
                    </form>
                </div>
            </div>
            <hr>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Events</h5>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Branch Name</th>
                                            <th>Contact</th>
                                            <th>Established</th>
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
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection