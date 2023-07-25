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
            @php
                  $party = ($agreement->partyOne == auth()->guard('civilian')->user()->id) ? $agreement->party2 : $agreement->party1;
            @endphp
          <small class="card-text text-uppercase">About</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span>{{ $party->name }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-number"></i><span class="fw-bold mx-2">NID:</span> <span>{{ $party->national_id }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span>{{ $party->phone }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span>{{ $party->email }}</span></li>
          </ul>
          <small class="card-text text-uppercase">Image</small>
          <ul class="list-unstyled mb-0 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-angular text-danger me-2"></i>
              <div class="d-flex flex-wrap"><span class="fw-bold me-2">Backend Developer</span><span>(126 Members)</span></div>
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
                <h5 class="card-action-title mb-0">{{ $agreement->category }}</h5>
                <div class="card-action-element">
                     {{-- update --}}
                     @if ($agreement->status == 'pending' && $agreement->created_by == auth()->guard('civilian')->user()->id)
                         <a href="{{ route('civilian.agreement.edit',$agreement->id) }}" class="btn btn-sm btn-light-primary">Edit</a>
                     @else

                     @if ($agreement->status == 'accepted')
                       <span class="badge bg-label-success ms-auto">Accepted</span>
                     @elseif($agreement->status == 'accepted')
                       <span class="badge bg-label-danger ms-auto">Rejected</span>

                     @else
                     <button type="button" data-bs-toggle="modal" data-bs-target="#accepted" class="btn btn-sm btn-label-linkedin waves-effect"> Accept</button>
                     <button type="button" data-bs-toggle="modal" data-bs-target="#reject" class="btn btn-sm btn-label-pinterest waves-effect"> Reject</button>
                     @endif
                            <!-- Approve Modal -->
                                <div class="modal fade" id="accepted" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">Accept Agreement</h3>
                                        </div>
                                        <p>Make sure you have read the agreement carefully before approving it.
                                            Ensure that you have understood all the terms and conditions of the agreement.</p>

                                            <form action="{{ route('civilian.agreement.accept',$agreement->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                            <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary me-2">Accept</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!--/ Approve Modal -->
                             <!-- Reject Model -->
                                <div class="modal fade" id="reject" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">Reject Agreement</h3>
                                        </div>
                                        <p>Are you sure you want to reject this agreement?
                                            Ensure that you have understood all the terms and conditions of the agreement.
                                        </p>

                                        <form action="{{ route('civilian.agreement.reject',$agreement->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-danger me-2">Yes Reject</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                             <!--/ Reject Model -->
                     @endif
                </div>
            </div>
            <div class="card-body pb-0">
                <p>
                {{ $agreement->description }}
                </p>
            </div>
      </div>

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
