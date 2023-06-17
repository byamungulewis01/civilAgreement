@extends('layouts.app')
@section('title') Create Agreement @endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('body')

<!-- Create Deal Wizard -->
<div id="wizard-create-deal" class="bs-stepper vertical mt-2 linear">
    <div class="bs-stepper-header">
        <div class="step active" data-target="#deal-type">
            <button type="button" class="step-trigger" aria-selected="true">
                <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Deal Type</span>
                    <span class="bs-stepper-subtitle">Choose type of deal</span>
                </span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#deal-details">
            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                <span class="bs-stepper-circle"><i class="ti ti-id ti-sm"></i></span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Deal Details</span>
                    <span class="bs-stepper-subtitle">Provide deal details</span>
                </span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#deal-usage">
            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                <span class="bs-stepper-circle"><i class="ti ti-credit-card ti-sm"></i></span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Deal Usage</span>
                    <span class="bs-stepper-subtitle">Limitations &amp; Offers</span>
                </span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#review-complete">
            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                <span class="bs-stepper-circle"><i class="ti ti-checkbox ti-sm"></i></span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Review &amp; Complete</span>
                    <span class="bs-stepper-subtitle">Launch a deal!</span>
                </span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <form id="wizard-create-deal-form" onsubmit="return false">
            <!-- Deal Type -->
            <div id="deal-type" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">

                    <div class="col-12 pb-2">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon checked">
                                    <label class="form-check-label custom-option-content" for="customRadioPercentage">
                                        <span class="custom-option-body">

                                            <span class="custom-option-title">Percentage</span>
                                            <small>Create a deal which offer uses some % off (i.e 5% OFF) on
                                                total.</small>
                                        </span>
                                        <input name="customRadioIcon" class="form-check-input" type="radio" value=""
                                            id="customRadioPercentage" checked="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioPrime">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title"> Prime Member </span>
                                            <small>Create prime member only deal to encourage the prime members.</small>
                                        </span>
                                        <input name="customRadioIcon" class="form-check-input" type="radio" value=""
                                            id="customRadioPrime">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container">
                        <label class="form-label" for="dealAmount">Discount</label>
                        <input type="number" name="dealAmount" id="dealAmount" class="form-control" placeholder="25"
                            min="0" max="100000000" aria-describedby="dealAmountHelp">
                        <div id="dealAmountHelp" class="form-text">Enter the discount percentage. 10 = 10%</div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="dealDuration" class="form-label">Deal Duration</label>
                        <input type="text" id="dealDuration" name="dealDuration" class="form-control flatpickr-input"
                            placeholder="YYYY-MM-DD to YYYY-MM-DD" readonly="readonly">
                            <div id="dealAmountHelp" class="form-text">Enter the discount percentage. 10 = 10%</div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev waves-effect" disabled=""> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                </div>
            </div>
            <!-- Deal Details -->
            <div id="deal-details" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">

                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement </label>
                        <input type="text" name="agreement" id="agreement" class="form-control" placeholder="Agreement"
                            aria-describedby="agreementHelp">
                      </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="plAddress">Address</label>
                        <textarea id="plAddress" name="plAddress" class="form-control" rows="8" placeholder="12, Business Park"></textarea>
                      </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                </div>
            </div>
            <!-- Deal Usage -->
            <div id="deal-usage" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="dealUserType">User Type</label>
                        <select id="dealUserType" name="dealUserType" class="form-select">
                            <option selected="" disabled="" value="">Select user type</option>
                            <option value="all">All</option>
                            <option value="registered">Registered</option>
                            <option value="unregistered">Unregistered</option>
                            <option value="prime-members">Prime members</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="dealMaxUsers">Max Users</label>
                        <input type="number" id="dealMaxUsers" name="dealMaxUsers" class="form-control"
                            placeholder="500">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="dealMinimumCartAmount">Minimum Cart Amount</label>
                        <input type="number" id="dealMinimumCartAmount" name="dealMinimumCartAmount"
                            class="form-control" placeholder="$99">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="dealPromotionalFee">Promotional Fee</label>
                        <input type="number" id="dealPromotionalFee" name="dealPromotionalFee" class="form-control"
                            placeholder="$9">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="dealPaymentMethod">Payment Method</label>
                        <select id="dealPaymentMethod" name="dealPaymentMethod" class="form-select">
                            <option selected="" disabled="" value="">Select payment method</option>
                            <option value="any">Any</option>
                            <option value="credit-card">Credit Card</option>
                            <option value="net-banking">Net Banking</option>
                            <option value="wallet">Wallet</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="dealStatus">Deal Status</label>
                        <select id="dealStatus" name="dealStatus" class="form-select">
                            <option selected="" disabled="" value="">Select status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspend">Suspend</option>
                            <option value="abandon">Abandone</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label class="switch">
                            <input type="checkbox" class="switch-input" id="dealLimitUser" name="dealLimitUser">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label"> Limit this discount to a single-use per customer?</span>
                        </label>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                </div>
            </div>
            <!-- Review & Complete -->
            <div id="review-complete" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12 mb-0">
                                <h3>Almost done! 🚀</h3>
                                <p>Confirm your deal details information and submit to create it.</p>
                            </div>
                            <div class="col-12 mb-0">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="ps-0 align-top text-nowrap py-1"><strong>Deal Type</strong></td>
                                            <td class="px-0 py-1">Percentage</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0 align-top text-nowrap py-1"><strong>Amount</strong></td>
                                            <td class="px-0 py-1">25%</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0 align-top text-nowrap py-1"><strong>Deal Code</strong></td>
                                            <td class="px-0 py-1">
                                                <div class="badge bg-label-warning">25PEROFF</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0 align-top text-nowrap py-1"><strong>Deal Title</strong></td>
                                            <td class="px-0 py-1">Black friday sale, 25% OFF</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0 align-top text-nowrap py-1"><strong>Deal Duration</strong>
                                            </td>
                                            <td class="px-0 py-1"><span class="fw-semibold">2021-07-14</span> to <span
                                                    class="fw-semibold">2021-07-30</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 d-flex justify-content-center border rounded pt-3">
                        <img class="img-fluid" src="../../assets/img/illustrations/wizard-create-deal-confirm.png"
                            alt="deal image cap">
                    </div>
                    <div class="col-md-12">
                        <label class="switch">
                            <input type="checkbox" class="switch-input" id="dealConfirmed" name="dealConfirmed">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label"> I have confirmed the deal details.</span>
                        </label>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit btn-next waves-effect waves-light"><span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                                class="ti ti-check ti-xs"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Create Deal Wizard -->


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
