@extends('layouts.app')
@section('title') Show Agreement @endsection
@section('body')
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card mb-4">
            <div class="card-body">

                <small class="card-text text-uppercase">party 1</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full
                            Name:</span> <span>{{ $agreement->party1->name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-number"></i><span
                            class="fw-bold mx-2">NID:</span> <span>{{ $agreement->party1->national_id }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span
                            class="fw-bold mx-2">Contact:</span> <span>{{ $agreement->party1->phone }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                            class="fw-bold mx-2">Email:</span> <span>{{ $agreement->party1->email }}</span></li>
                </ul>
                <small class="card-text text-uppercase mb-3">national id</small>
                <img class="card-img-top" src="{{ asset('images/'.$agreement->party1->national_id_image.'') }}"
                    alt="Card image cap">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <small class="card-text text-uppercase">party 2</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full
                            Name:</span> <span>{{ $agreement->party2->name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-number"></i><span
                            class="fw-bold mx-2">NID:</span> <span>{{ $agreement->party2->national_id }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span
                            class="fw-bold mx-2">Contact:</span> <span>{{ $agreement->party2->phone }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                            class="fw-bold mx-2">Email:</span> <span>{{ $agreement->party2->email }}</span></li>
                </ul>
                <small class="card-text text-uppercase mb-3">national id</small>
                <img class="card-img-top" src="{{ asset('images/'.$agreement->party2->national_id_image.'') }}"
                    alt="Card image cap" />
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <div class="card mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">{{ $agreement->category }}</h5>
            </div>
            <div class="card-body pb-0">
                <p>
                    {{ $agreement->description }}
                </p>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="bg-lighter px-3 py-2 rounded me-auto mb-3">
                        <h6 class="mb-0">Total Amount</h6>
                        <small class="mb-0 text-danger">RWF {{ number_format($agreement->amount) }}</small>
                    </div>
                    <div class="text-end mb-3">
                        @php
                        $start = explode(' to ', $agreement->duration)[0];
                        $deadline = explode(' to ', $agreement->duration)[1];
                        $days = \Carbon\Carbon::parse($deadline)->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <h6 class="mb-0">Start Date: <span class="text-body fw-normal">{{
                                \Carbon\Carbon::parse($start)->format('d/m/y') }}</span></h6>
                        <h6 class="mb-1">Deadline: <span class="text-body fw-normal">{{
                                \Carbon\Carbon::parse($deadline)->format('d/m/y') }}</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">All Payments</h5>
            </div>
            <div class="card-body pb-0">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment Date</th>
                                <th>Amount Payed</th>
                                <th>Remaining Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $amount = 0;
                            $remaining = 0;
                            @endphp

                            @foreach ($payments as $item)
                            <tr>
                                <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                <td>{{ number_format($item->amount) }}</td>
                                <td>
                                    {{ number_format($agreement->amount - $item->amount) }}
                                </td>
                            </tr>
                            @php
                            $amount += $item->amount;
                            $remaining = $agreement->amount - $amount;
                            @endphp

                            @endforeach

                        </tbody>
                        <tfoot class="table-border-bottom-0">
                            <tr>
                                <th colspan="2" class="rounded-start-bottom"><strong>Total</strong></th>
                                <th><strong>{{ number_format($amount) }}</strong></th>
                                <th class="rounded-end-bottom"><strong>{{ number_format($remaining) }}</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Withdrawals History</h5>
            </div>
            <div class="card-body pb-0">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Remaining Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $amount = 0;
                            $remaining = 0;
                            @endphp

                            @foreach ($withdrawals as $item)
                            <tr>
                                <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                <td>{{ number_format($item->amount) }}</td>
                                <td>
                                    {{ number_format($agreement->amount - $item->amount) }}
                                </td>
                            </tr>
                            @php
                            $amount += $item->amount;
                            $remaining = $agreement->amount - $amount;
                            @endphp

                            @endforeach

                        </tbody>
                        <tfoot class="table-border-bottom-0">
                            <tr>
                                <th colspan="2" class="rounded-start-bottom"><strong>Total</strong></th>
                                <th><strong>{{ number_format($amount) }}</strong></th>
                                <th class="rounded-end-bottom"><strong>{{ number_format($remaining) }}</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

