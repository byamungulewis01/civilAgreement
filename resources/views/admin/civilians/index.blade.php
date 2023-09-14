@extends('layouts.app')
@section('title') Citizen @endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

@endsection

@section('body')

<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title mb-3">
            @if (Request::routeIs('admin.civilian.index'))
            All Citizen
            @elseif(Request::routeIs('admin.civilian.active'))
            Active Citizen
            @elseif(Request::routeIs('admin.civilian.inactive'))
            Inactive Citizen
            @else
            Deactive Citizen
            @endif
            @unless (Request::routeIs('admin.civilian.disactive'))
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#addCivilian">
                <i class="ti ti-plus"></i> Add Citizen
            </button>
            @endunless
        </h5>
        <!-- Add New Credit Card Modal -->
        <div class="modal fade" id="addCivilian" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Add New Citizen</h3>
                            <p class="text-muted">Information About Civilian to Join CAM System</p>
                        </div>

                        <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                            action="{{ route('admin.civilian.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>* {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3 fv-plugins-icon-container">
                                <label for="name" class="form-label"> Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Enter your name" autofocus="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 fv-plugins-icon-container">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Enter your email">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3 fv-plugins-icon-container">

                                    <label for="national_id" class="form-label">National ID</label>
                                    <input type="text" class="form-control" id="national_id" name="national_id" required
                                        placeholder="Enter your ID Number" minlength="16" maxlength="16">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="mb-3 fv-plugins-icon-container">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text">RW (+25)</span>
                                    <input type="text" id="phone" name="phone" required class="form-control"
                                        placeholder="Phone number" minlength="10" maxlength="10">
                                </div>
                            </div>
                            <div class="mb-3 fv-plugins-icon-container">
                                <label for="national_id_image" class="form-label">National ID Image</label>
                                <input class="form-control" required type="file" id="national_id_image"
                                    name="file" accept="image/*">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                Register
                            </button>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Add New Credit Card Modal -->
    </div>
    <div class="card-datatable table-responsive">
        <table id="datatables" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>National ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($civilians as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->national_id }}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge  bg-label-success">Active</span>
                        @elseif($item->status == 2)
                        <span class="badge  bg-label-warning">Inactive</span>
                        @else
                        <span class="badge  bg-label-danger">Disactive</span>
                        @endif
                    </td>
                    <td>

                        <div data-bs-toggle="modal" data-bs-target="#editCivilian{{ $item->id }}"
                            class="d-flex align-items-center">
                            @unless (Request::routeIs('admin.civilian.disactive'))
                            <a href="javascript:;" class="text-body edit-record "><i
                                    class="ti ti-edit ti-sm me-2"></i></a>

                            <a data-bs-toggle="modal" data-bs-target="#deleteCivilian{{ $item->id }}"
                                href="javascript:;" class="text-body delete-record 1"><i
                                    class="ti ti-trash ti-sm mx-2"></i></a>
                            @else
                            <a data-bs-toggle="modal" data-bs-target="#activate{{ $item->id }}"
                                href="javascript:;" class="text-body delete-record 1"><i
                                    class="ti ti-check ti-sm mx-2"></i> Activate</a>

                            @endunless

                        </div>
                        <div class="modal fade" id="editCivilian{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">Edit Civilian</h3>
                                            <p class="text-muted">Information About Civilian to Join CAM System</p>
                                        </div>

                                        <form id="formAuthentication"
                                            class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                                            action="{{ route('admin.civilian.update',$item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                                <p><strong>Opps Something went wrong</strong></p>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>* {{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label for="name" class="form-label"> Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required
                                                    value="{{ $item->name }}">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required value="{{ $item->email }}">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="row mb-3">

                                                <div class="col-md-6 fv-plugins-icon-container">

                                                    <label for="national_id" class="form-label">National ID</label>
                                                    <input type="text" class="form-control" id="national_id"
                                                        name="national_id" value="{{ $item->national_id }}"
                                                        minlength="16" maxlength="16">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-6 fv-plugins-icon-container">

                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="status" class="form-select" id="">
                                                        <option {{ $item->status == 1 ? 'selected' : '' }}
                                                            value="1">Active</option>
                                                        <option {{ $item->status == 2 ? 'selected' : '' }}
                                                            value="2">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label for="phone" class="form-label">Phone</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">RW (+25)</span>
                                                    <input type="text" id="phone" name="phone" required
                                                        class="form-control" value="{{ $item->phone }}" minlength="10"
                                                        maxlength="10">
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label for="national_id_image" class="form-label">National ID
                                                    Image</label>
                                                <input class="form-control" type="file" id="national_id_image"
                                                    name="file" accept="image/*">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                                Save
                                            </button>
                                            <input type="hidden">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteCivilian{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.civilian.destroy',$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">

                                            <div class="text-center mb-1">
                                                <h3 class="mb-2">Are sure to do this?</h3>
                                                <p class="text-muted">You Are About to delete a civilian ,so be
                                                    Attention</p>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Yes Delete</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="activate{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.civilian.activate',$item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">

                                            <div class="text-center mb-1">
                                                <h3 class="mb-2">Are sure to Activate?</h3>
                                                <p class="text-muted">You Are About to Active a civilian to be active</p>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

<script>
    //  national_id must be numeric only
    $(document).ready(function () {
        $("#phone").keydown(function (event) {
            if (event.shiftKey) {
                event.preventDefault();
            }

            if (event.keyCode == 46 || event.keyCode == 8) {} else {
                if (event.keyCode < 95) {
                    if (event.keyCode < 48 || event.keyCode > 57) {
                        event.preventDefault();
                    }
                } else {
                    if (event.keyCode < 96 || event.keyCode > 105) {
                        event.preventDefault();
                    }
                }
            }
        });
        $("#national_id").keydown(function (event) {
            if (event.shiftKey) {
                event.preventDefault();
            }

            if (event.keyCode == 46 || event.keyCode == 8) {} else {
                if (event.keyCode < 95) {
                    if (event.keyCode < 48 || event.keyCode > 57) {
                        event.preventDefault();
                    }
                } else {
                    if (event.keyCode < 96 || event.keyCode > 105) {
                        event.preventDefault();
                    }
                }
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#datatables').DataTable()
    });
</script>
@endsection
