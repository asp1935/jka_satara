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


                        <table class="table datatable">
                          <thead>
                            <tr>
                              <th>Sr.no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Message</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if ($contacts)




                            @foreach ($contacts as $id => $contact)


                            <tr>
                              <td>{{ $id+1 }}</td>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->mobile }}</td>
                              <td>{{ $contact->message }}</td>
                              <td>


                                <a href="{{ route('admin.delete_contact',$contact->id ) }}" class="btn btn-danger">Delete</a>
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
