@extends('layouts.app')
@section('title') Agreements @endsection
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
            @if (Request::routeIs('admin.agreements.index'))
            All Agreements
            @elseif(Request::routeIs('admin.agreements.pending'))
            Pending Agreements
            @elseif(Request::routeIs('admin.agreements.fail'))
            Fail Agreements
            @else
            Completed Agreements
            @endif
        </h5>
    </div>
    <div class="card-datatable table-responsive">
        <table id="datatables" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Agreements</th>
                    <th>First Party</th>
                    <th>Second Party</th>
                    <th>Value</th>
                    <th>Duration</th>
                    <th>Remaining time</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agreements as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->party1->name }}</td>
                    <td>{{ $item->party2->name }}</td>
                    <td>{{ number_format($item->amount) }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>
                        @php
                        $start = explode(' to ', $item->duration)[0];
                        $deadline = explode(' to ', $item->duration)[1];
                        $days = \Carbon\Carbon::parse($deadline)->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <span class="badge bg-label-{{ $days > 5 ? 'success' : 'danger' }} ms-auto">{{ $days }} Days left</span>
                    </td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge  bg-label-success">Active</span>
                        @elseif($item->status == 2)
                        <span class="badge  bg-label-warning">Inactive</span>
                        @else
                        <span class="badge  bg-label-danger">Disactive</span>
                        @endif
                    </td>
                    <td>View
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
    $(document).ready(function () {
        $('#datatables').DataTable({ scrollX: true,})
    });
</script>
@endsection
