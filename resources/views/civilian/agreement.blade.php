@extends('layouts.app')
@section('title') Create Agreement @endsection


@section('body')
<div class="row g-4">


    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-start">
              <div class="avatar me-2">
                <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar" class="rounded-circle">
              </div>
              <div class="me-2 ms-1">
                <h5 class="mb-0"><a href="javascript:;" class="stretched-link text-body">BYAMUNGU Lewis</a></h5>
                <div class="client-info"><span class="text-muted">11998828989893839</span></div>
              </div>
            </div>
            <div class="ms-auto">
                <span class="badge bg-label-danger ms-auto">5 Days left</span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center flex-wrap">
            <div class="bg-lighter px-3 py-2 rounded me-auto mb-3">
              <h6 class="mb-0">$52.7k <span class="text-body fw-normal">/ $28.4k</span></h6>
              <span>Total Budget</span>
            </div>
            <div class="text-end mb-3">
              <h6 class="mb-0">Start Date: <span class="text-body fw-normal">12/12/20</span></h6>
              <h6 class="mb-1">Deadline: <span class="text-body fw-normal">25/12/21</span></h6>
            </div>
          </div>
          <p class="mb-0">Use this template to organize your design project. Some of the key features are…</p>
        </div>
        <div class="card-body border-top">

          <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
            <small>Task: 29/285</small>
            <small>35% Completed</small>
          </div>
          <div class="progress mb-2" style="height: 8px;">
            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex align-items-center pt-1">
            <div class="d-flex align-items-center">

            </div>
            <div class="ms-auto">
              <a href="{{ route('civilian.agreement.show') }}" class="text-body"><i class="ti ti-message-dots ti-sm"></i> More</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('js')

@endsection
