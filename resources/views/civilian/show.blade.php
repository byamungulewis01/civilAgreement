@extends('layouts.app')
@section('title') Show Agreement @endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('body')
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- About User -->
      <div class="card mb-4">
        <div class="card-body">
          <small class="card-text text-uppercase">About</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span>John Doe</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span>Active</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span>Developer</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span class="fw-bold mx-2">Country:</span> <span>USA</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-file-description"></i><span class="fw-bold mx-2">Languages:</span> <span>English</span></li>
          </ul>
          <small class="card-text text-uppercase">Contacts</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span>(123) 456-7890</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-skype"></i><span class="fw-bold mx-2">Skype:</span> <span>john.doe</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span>john.doe@example.com</span></li>
          </ul>
          <small class="card-text text-uppercase">Teams</small>
          <ul class="list-unstyled mb-0 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-angular text-danger me-2"></i>
              <div class="d-flex flex-wrap"><span class="fw-bold me-2">Backend Developer</span><span>(126 Members)</span></div>
            </li>
            <li class="d-flex align-items-center"><i class="ti ti-brand-react-native text-info me-2"></i>
              <div class="d-flex flex-wrap"><span class="fw-bold me-2">React Developer</span><span>(98 Members)</span></div>
            </li>
          </ul>
        </div>
      </div>
      <!--/ About User -->
      <!-- Profile Overview -->
      <div class="card mb-4">
        <div class="card-body">
          <p class="card-text text-uppercase">Overview</p>
          <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Task Compiled:</span> <span>13.5k</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-layout-grid"></i><span class="fw-bold mx-2">Projects Compiled:</span> <span>146</span></li>
            <li class="d-flex align-items-center"><i class="ti ti-users"></i><span class="fw-bold mx-2">Connections:</span> <span>897</span></li>
          </ul>
        </div>
      </div>
      <!--/ Profile Overview -->
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
      <!-- Activity Timeline -->
      <div class="card card-action mb-4">
        <div class="card-header align-items-center">
          <h5 class="card-action-title mb-0">Activity Timeline</h5>
          <div class="card-action-element">
            <div class="dropdown">
              <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body pb-0">
          <ul class="timeline ms-1 mb-0">
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="timeline-header">
                  <h6 class="mb-0">Client Meeting</h6>
                  <small class="text-muted">Today</small>
                </div>
                <p class="mb-2">Project meeting with john @10:15am</p>
                <div class="d-flex flex-wrap">
                  <div class="avatar me-2">
                    <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="ms-1">
                    <h6 class="mb-0">Lester McCarthy (Client)</h6>
                    <span>CEO of Infibeam</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-success"></span>
              <div class="timeline-event">
                <div class="timeline-header">
                  <h6 class="mb-0">Create a new project for client</h6>
                  <small class="text-muted">2 Day Ago</small>
                </div>
                <p class="mb-0">Add files to new design folder</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent">
              <span class="timeline-point timeline-point-danger"></span>
              <div class="timeline-event">
                <div class="timeline-header">
                  <h6 class="mb-0">Shared 2 New Project Files</h6>
                  <small class="text-muted">6 Day Ago</small>
                </div>
                <p class="mb-2">Sent by Mollie Dixon <img src="../../assets/img/avatars/4.png" class="rounded-circle me-3" alt="avatar" height="24" width="24"></p>
                <div class="d-flex flex-wrap gap-2 pt-1">
                  <a href="javascript:void(0)" class="me-3">
                    <img src="../../assets/img/icons/misc/doc.png" alt="Document image" width="15" class="me-2">
                    <span class="fw-semibold text-heading">App Guidelines</span>
                  </a>
                  <a href="javascript:void(0)">
                    <img src="../../assets/img/icons/misc/xls.png" alt="Excel image" width="15" class="me-2">
                    <span class="fw-semibold text-heading">Testing Results</span>
                  </a>
                </div>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent border-0">
              <span class="timeline-point timeline-point-info"></span>
              <div class="timeline-event">
                <div class="timeline-header">
                  <h6 class="mb-0">Project status updated</h6>
                  <small class="text-muted">10 Day Ago</small>
                </div>
                <p class="mb-0">Woocommerce iOS App Completed</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!--/ Activity Timeline -->
      <div class="row">
        <!-- Connections -->
        <div class="col-lg-12 col-xl-6">
          <div class="card card-action mb-4">
            <div class="card-header align-items-center">
              <h5 class="card-action-title mb-0">Connections</h5>
              <div class="card-action-element">
                <div class="dropdown">
                  <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mb-0">
                <li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Cecilia Payne</h6>
                        <small class="text-muted">45 Connections</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-label-primary btn-icon btn-sm waves-effect"><i class="ti ti-user-check ti-xs"></i></button>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Curtis Fletcher</h6>
                        <small class="text-muted">1.32k Connections</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-primary btn-icon btn-sm waves-effect waves-light"><i class="ti ti-user-x ti-xs"></i></button>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Alice Stone</h6>
                        <small class="text-muted">125 Connections</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-primary btn-icon btn-sm waves-effect waves-light"><i class="ti ti-user-x ti-xs"></i></button>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Darrell Barnes</h6>
                        <small class="text-muted">456 Connections</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-label-primary btn-icon btn-sm waves-effect"><i class="ti ti-user-check ti-xs"></i></button>
                    </div>
                  </div>
                </li><li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Eugenia Moore</h6>
                        <small class="text-muted">1.2k Connections</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-label-primary btn-icon btn-sm waves-effect"><i class="ti ti-user-check ti-xs"></i></button>
                    </div>
                  </div>
                </li>
                <li class="text-center">
                  <a href="javascript:;">View all connections</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--/ Connections -->
        <!-- Teams -->
        <div class="col-lg-12 col-xl-6">
          <div class="card card-action mb-4">
            <div class="card-header align-items-center">
              <h5 class="card-action-title mb-0">Teams</h5>
              <div class="card-action-element">
                <div class="dropdown">
                  <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mb-0">
                <li class="mb-3">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/icons/brands/react-label.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">React Developers</h6>
                        <small class="text-muted">72 Members</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/icons/brands/support-label.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Support Team</h6>
                        <small class="text-muted">122 Members</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript:;"><span class="badge bg-label-primary">Support</span></a>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">UI Designers</h6>
                        <small class="text-muted">7 Members</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript:;"><span class="badge bg-label-info">Designer</span></a>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/icons/brands/vue-label.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Vue.js Developers</h6>
                        <small class="text-muted">289 Members</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-start">
                      <div class="avatar me-2">
                        <img src="../../assets/img/icons/brands/twitter-label.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div class="me-2 ms-1">
                        <h6 class="mb-0">Digital Marketing</h6>
                        <small class="text-muted">24 Members</small>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript:;"><span class="badge bg-label-secondary">Marketing</span></a>
                    </div>
                  </div>
                </li>
                <li class="text-center">
                  <a href="javascript:;">View all teams</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--/ Teams -->
      </div>
      <!-- Projects table -->
      <div class="card mb-4">
        <div class="card-datatable table-responsive">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="card-header pb-0 pt-sm-0"><div class="head-label text-center"><h5 class="card-title mb-0">Projects</h5></div><div class="d-flex justify-content-center justify-content-md-end"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><table class="datatables-projects table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 630px;">
            <thead>
              <tr><th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 9px;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 17px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 211px;" aria-label="Name: activate to sort column ascending" aria-sort="descending">Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px;" aria-label="Leader: activate to sort column ascending">Leader</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 92px;" aria-label="Team">Team</th><th class="w-px-200 sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 0px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions">Actions</th></tr>
            </thead><tbody><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-warning">WS</span></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Website SEO</span><small class="text-truncate text-muted">10 May 2021</small></div></div></td><td>Eileen</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 38%" aria-valuenow="38%" aria-valuemin="0" aria-valuemax="100"></div></div><span>38%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/social-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Social Banners</span><small class="text-truncate text-muted">03 Jan 2021</small></div></div></td><td>Owen</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/11.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 45%" aria-valuenow="45%" aria-valuemin="0" aria-valuemax="100"></div></div><span>45%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/sketch-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Logo Designs</span><small class="text-truncate text-muted">12 Aug 2021</small></div></div></td><td>Keith</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 92%" aria-valuenow="92%" aria-valuemin="0" aria-valuemax="100"></div></div><span>92%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/sketch-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">IOS App Design</span><small class="text-truncate text-muted">19 Apr 2021</small></div></div></td><td>Merline</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 56%" aria-valuenow="56%" aria-valuemin="0" aria-valuemax="100"></div></div><span>56%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Figma Dashboards</span><small class="text-truncate text-muted">08 Apr 2021</small></div></div></td><td>Harmonia</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 25%" aria-valuenow="25%" aria-valuemin="0" aria-valuemax="100"></div></div><span>25%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/html-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Crypto Admin</span><small class="text-truncate text-muted">29 Sept 2021</small></div></div></td><td>Allyson</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 36%" aria-valuenow="36%" aria-valuemin="0" aria-valuemax="100"></div></div><span>36%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/icons/brands/react-label.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-semibold">Create Website</span><small class="text-truncate text-muted">20 Mar 2021</small></div></div></td><td>Georgie</td><td><div class="d-flex align-items-center avatar-group"><div class="avatar avatar-sm"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle pull-up"></div><div class="avatar avatar-sm"><img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle pull-up"></div></div></td><td class="" style=""><div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: 72%" aria-valuenow="72%" aria-valuemin="0" aria-valuemax="100"></div></div><span>72%</span></div></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></td></tr></tbody>
          </table><div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7 of 10 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
        </div>
      </div>
      <!--/ Projects table -->
    </div>
  </div>
@endsection
@section('js')
<script>
    "use strict";
    ! function () {
        var e = document.querySelector("#dealDuration"),
            e = (e && e.flatpickr({
                mode: "range"
            }), window.Helpers.initCustomOptionCheck(), document.querySelector("#wizard-create-deal"));
        if (null !== e) {
            var o = e.querySelector("#wizard-create-deal-form"),
                a = o.querySelector("#deal-type"),
                i = o.querySelector("#deal-details"),
                l = o.querySelector("#deal-usage"),
                n = o.querySelector("#review-complete"),
                r = [].slice.call(o.querySelectorAll(".btn-next")),
                o = [].slice.call(o.querySelectorAll(".btn-prev"));
            let t = new Stepper(e, {
                linear: !0
            });
            const s = FormValidation.formValidation(a, {
                fields: {
                    dealAmount: {
                        validators: {
                            notEmpty: {
                                message: "Please enter amount",

                            },
                            numeric: {
                                message: "The amount must be a number"
                            },
                        }
                    },
                    dealDuration: {
                        validators: {
                            notEmpty: {
                                message: "Please enter duration"
                            },

                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () {
                t.next()
            });
            e = $("#dealRegion");
            e.length && (e.wrap('<div class="position-relative"></div>'), e.select2({
                placeholder: "Select an region",
                dropdownParent: e.parent()
            }).on("change.select2", function () {
                s.revalidateField("dealRegion")
            }));
            const d = FormValidation.formValidation(i, {
                fields: {
                    dealTitle: {
                        validators: {
                            notEmpty: {
                                message: "Please enter deal title"
                            }
                        }
                    },
                    dealCode: {
                        validators: {
                            notEmpty: {
                                message: "Please enter deal code"
                            },
                            stringLength: {
                                min: 4,
                                max: 10,
                                message: "The deal code must be more than 4 and less than 10 characters long"
                            },
                            regexp: {
                                regexp: /^[A-Z0-9]+$/,
                                message: "The deal code can only consist of capital alphabetical and number"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () {
                t.next()
            });
            a = $("#dealOfferedItem");
            a.length && (a.wrap('<div class="position-relative"></div>'), a.select2({
                placeholder: "Select an offered item",
                dropdownParent: a.parent()
            }).on("change.select2", function () {}));
            const c = FormValidation.formValidation(l, {
                    fields: {},
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: ".col-sm-6"
                        }),
                        autoFocus: new FormValidation.plugins.AutoFocus,
                        submitButton: new FormValidation.plugins.SubmitButton
                    }
                }).on("core.form.valid", function () {
                    t.next()
                }),
                u = FormValidation.formValidation(n, {
                    fields: {},
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: ".col-md-12"
                        }),
                        autoFocus: new FormValidation.plugins.AutoFocus,
                        submitButton: new FormValidation.plugins.SubmitButton
                    }
                }).on("core.form.valid", function () {
                    alert("Submitted..!!")
                });
            r.forEach(e => {
                e.addEventListener("click", e => {
                    switch (t._currentIndex) {
                        case 0:
                            s.validate();
                            break;
                        case 1:
                            d.validate();
                            break;
                        case 2:
                            c.validate();
                            break;
                        case 3:
                            u.validate()
                    }
                })
            }), o.forEach(e => {
                e.addEventListener("click", e => {
                    switch (t._currentIndex) {
                        case 3:
                        case 2:
                        case 1:
                            t.previous()
                    }
                })
            })
        }
    }();

</script>

@endsection
