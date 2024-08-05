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
            @elseif(Request::routeIs('admin.agreements.accepted'))
            Accepted Agreements
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
                    {{-- <th>Status</th> --}}
                    <th style="width: 20%"></th>
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
                        <span class="badge bg-label-{{ $days > 5 ? 'success' : 'danger' }} ms-auto">{{ $days }} Days
                            left</span>
                    </td>
                    {{-- <td>
                        @if ($item->status == 1)
                        <span class="badge  bg-label-success">Active</span>
                        @elseif($item->status == 2)
                        <span class="badge  bg-label-warning">Inactive</span>
                        @else
                        <span class="badge  bg-label-danger">Disactive</span>
                        @endif
                    </td> --}}
                    <td>
                        <a href="{{ route('admin.agreements.print',$item->id) }}" class="btn btn-sm btn-dark me-2" target="_blank"><i class="ti ti-printer ti-sm me-1"></i> Print</a>
                        <a href="{{ route('admin.agreements.show',$item->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-eye ti-sm me-1"></i> View</a>
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
{{-- <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>


{{-- <script>
    $(document).ready(function () {
        $('#datatables').DataTable({ scrollX: true,})
    });
</script> --}}
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            scrollX: true,
            dom: '<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        language: {
            sLengthMenu: "_MENU_",
            search: "",
            searchPlaceholder: "Search..",
        },
        buttons: [
            {
                extend: "collection",
                className:
                    "btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light",
                text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                buttons: [
                    {
                        extend: "print",
                        text: '<i class="ti ti-printer me-2" ></i>Print',
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                body: function (e, t, a) {
                                    var s;
                                    return e.length <= 0
                                        ? e
                                        : ((e = $.parseHTML(e)),
                                          (s = ""),
                                          $.each(e, function (e, t) {
                                              void 0 !== t.classList &&
                                              t.classList.contains(
                                                  "user-name"
                                              )
                                                  ? (s +=
                                                        t.lastChild
                                                            .firstChild
                                                            .textContent)
                                                  : void 0 ===
                                                    t.innerText
                                                  ? (s += t.textContent)
                                                  : (s += t.innerText);
                                          }),
                                          s);
                                },
                            },
                        },
                        customize: function (e) {
                            $(e.document.body)
                                .css("color", s)
                                .css("border-color", t)
                                .css("background-color", a),
                                $(e.document.body)
                                    .find("table")
                                    .addClass("compact")
                                    .css("color", "inherit")
                                    .css("border-color", "inherit")
                                    .css("background-color", "inherit");
                        },
                    },
                    {
                        extend: "csv",
                        text: '<i class="ti ti-file-text me-2" ></i>Csv',
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                body: function (e, t, a) {
                                    var s;
                                    return e.length <= 0
                                        ? e
                                        : ((e = $.parseHTML(e)),
                                          (s = ""),
                                          $.each(e, function (e, t) {
                                              void 0 !== t.classList &&
                                              t.classList.contains(
                                                  "user-name"
                                              )
                                                  ? (s +=
                                                        t.lastChild
                                                            .firstChild
                                                            .textContent)
                                                  : void 0 ===
                                                    t.innerText
                                                  ? (s += t.textContent)
                                                  : (s += t.innerText);
                                          }),
                                          s);
                                },
                            },
                        },
                    },
                    {
                        extend: "excel",
                        text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                body: function (e, t, a) {
                                    var s;
                                    return e.length <= 0
                                        ? e
                                        : ((e = $.parseHTML(e)),
                                          (s = ""),
                                          $.each(e, function (e, t) {
                                              void 0 !== t.classList &&
                                              t.classList.contains(
                                                  "user-name"
                                              )
                                                  ? (s +=
                                                        t.lastChild
                                                            .firstChild
                                                            .textContent)
                                                  : void 0 ===
                                                    t.innerText
                                                  ? (s += t.textContent)
                                                  : (s += t.innerText);
                                          }),
                                          s);
                                },
                            },
                        },
                    },
                    {
                        extend: "pdf",
                        text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                body: function (e, t, a) {
                                    var s;
                                    return e.length <= 0
                                        ? e
                                        : ((e = $.parseHTML(e)),
                                          (s = ""),
                                          $.each(e, function (e, t) {
                                              void 0 !== t.classList &&
                                              t.classList.contains(
                                                  "user-name"
                                              )
                                                  ? (s +=
                                                        t.lastChild
                                                            .firstChild
                                                            .textContent)
                                                  : void 0 ===
                                                    t.innerText
                                                  ? (s += t.textContent)
                                                  : (s += t.innerText);
                                          }),
                                          s);
                                },
                            },
                        },
                    },
                    {
                        extend: "copy",
                        text: '<i class="ti ti-copy me-2" ></i>Copy',
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                body: function (e, t, a) {
                                    var s;
                                    return e.length <= 0
                                        ? e
                                        : ((e = $.parseHTML(e)),
                                          (s = ""),
                                          $.each(e, function (e, t) {
                                              void 0 !== t.classList &&
                                              t.classList.contains(
                                                  "user-name"
                                              )
                                                  ? (s +=
                                                        t.lastChild
                                                            .firstChild
                                                            .textContent)
                                                  : void 0 ===
                                                    t.innerText
                                                  ? (s += t.textContent)
                                                  : (s += t.innerText);
                                          }),
                                          s);
                                },
                            },
                        },
                    },
                ],
            },

        ],
        });
    });
</script>

@endsection
