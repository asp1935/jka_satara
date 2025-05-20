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
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">

                                <strong>{{ session()->get('success') }} </strong>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Contact</h5>


                                <table class="table datatable overflow-x-scroll">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Photo</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>DOB</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Blood Group</th>
                                            <th>Main Branch</th>
                                            <th>Sub Branch</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($students)
                                            @foreach ($students as $id => $student)
                                                <tr>
                                                    <td>{{ $id + 1 }}</td>
                                                    <td><img src="{{ asset('uploads/student_images/' . $student->photo) }}"
                                                            alt="image" height="130" width="100"> </td>
                                                    <td>{{ $student->student_id }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->mobile }}</td>
                                                    <td>{{ $student->dob }}</td>
                                                    <td>{{ $student->height }}</td>
                                                    <td>{{ $student->weight }}</td>
                                                    <td>{{ $student->bloodgroup }}</td>
                                                    <td>{{ $student->branch_id }}</td>
                                                    <td>{{ $student->sub_branch_id }}</td>
                                                    <td>
                                                        <a href=" " class="btn btn-warning">Edit</a>
                                                        <a href="" class="btn btn-danger">Delete</a>
                                                    </td>
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