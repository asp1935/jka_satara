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
                    
                    <h3 class="card-title">Add New Trainer</h1>
                        <form action="{{ route('admin.trainer.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="designation" name="designation" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="image" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="branch_id" class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-10">
                                    <select name="branch_id" id="branch_id" class="form-control" required>
                                        <option value="">Select Branch</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sub_branch_id" class="col-sm-2 col-form-label">Sub Branch</label>
                                <div class="col-sm-10">
                                    <select name="sub_branch_id" id="sub_branch_id" class="form-control" required>
                                        <option value="">Select Sub Branch</option>
                                        @foreach($subBranches as $sub)
                                            <option value="{{ $sub->id }}" data-branch="{{ $sub->branch_id }}">
                                                {{ $sub->branch->name }} - {{ $sub->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Add Trainer</button>
                                </div>
                            </div>


                        </form>
                </div>
            </div>
        </main>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const branchSelect = document.getElementById('branch_id');
            const subBranchSelect = document.getElementById('sub_branch_id');

            branchSelect.addEventListener('change', function () {
                const selectedBranchId = this.value;

                Array.from(subBranchSelect.options).forEach(option => {
                    option.style.display = 'block';
                    if (selectedBranchId && option.value && option.dataset.branch !== selectedBranchId) {
                        option.style.display = 'none';
                    }
                });

                subBranchSelect.value = '';
            });

            // Initialize based on current selection (for edit form)
            if (branchSelect.value) {
                branchSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>


@endsection