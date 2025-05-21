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
                    <h5 class="card-title">Add/Update Syllabus</h5>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">

                            <strong>{{ session()->get('success') }} </strong>
                        </div>
                    @endif
                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('admin.upsertSyllabus') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputNanme4" name="name" required>
                        </div>

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Select Syllabus PDF</label>
                            <input type="file" class="form-control" id="inputNanme4" name="file" accept="application/pdf"
                                required>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{$syllabus?'Update':'Submit'}}</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>


            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Brochures</h5>


                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>PDF</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($syllabus)




                                            {{-- @foreach ($brochures as $id => $brochures) --}}


                                            <tr>
                                                <td>{{ $syllabus->id }}</td>
                                                <td><iframe src="{{ asset('uploads/syllabus/' . $syllabus->syllabus) }}"
                                                        alt="image" height="300px" width="250px"> </iframe></td>
                                                <td>{{ $syllabus->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.deleteSyllabus') }}" class="btn btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                            {{-- @endforeach --}}
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