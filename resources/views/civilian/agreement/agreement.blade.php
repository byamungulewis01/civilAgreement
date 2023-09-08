@extends('layouts.app')
@section('title') Create Agreement @endsection


@section('body')
<div class="row g-4">
    @forelse ($agreements as $item)
    @php
        $name = ($item->partyOne == auth()->guard('civilian')->user()->id) ? $item->party2->name : $item->party1->name;
        $national_id = ($item->partyOne == auth()->guard('civilian')->user()->id) ? $item->party2->national_id : $item->party1->national_id;
        $start = explode(' to ', $item->duration)[0];
        $deadline = explode(' to ', $item->duration)[1];
        $days = \Carbon\Carbon::parse($deadline)->diffInDays(\Carbon\Carbon::now());


    @endphp
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-start">
              <div class="me-2 ms-1">
                <h5 class="mb-0"><a href="{{ route('civilian.agreement.show',$item->id) }}" class="stretched-link text-body">{{ $name }}</a></h5>
                <div class="client-info"><span class="text-muted">{{ $national_id }}</span></div>
              </div>
            </div>
            <div class="ms-auto">
                <span class="badge bg-label-{{ $days > 5 ? 'success' : 'danger' }} ms-auto">{{ $days }} Days left</span>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center flex-wrap">
              <div class="bg-lighter px-3 py-2 rounded me-auto mb-3">
                  <h6 class="mb-0">Total Amount</h6>
                  <small class="mb-0 text-danger">RWF {{ number_format($item->amount) }}</small>
              </div>
              <div class="text-end mb-3">

                <h6 class="mb-0">Start Date: <span class="text-body fw-normal">{{ \Carbon\Carbon::parse($start)->format('d/m/y') }}</span></h6>
                <h6 class="mb-1">Deadline: <span class="text-body fw-normal">{{ \Carbon\Carbon::parse($deadline)->format('d/m/y') }}</span></h6>
              </div>
            </div>
            <h4 class="mb-0">{{ $item->category }}</h4>

        </div>
      </div>
    </div>
    @empty
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="empty-state text-center pb-3">
              <img src="{{ asset('assets/images/file-searching.svg') }}" alt="image" class="h-8">
              <h2 class="mt-4 mb-1">No Agreement</h2>
              <p class="mb-5">Looks like you have not created any agreement yet!</p>
              <a href="{{ route('civilian.agreement.create') }}" class="btn btn-primary">Create Agreement</a>
            </div>
          </div>
        </div>
      </div>

    @endforelse

  </div>
@endsection
@section('js')

@endsection
