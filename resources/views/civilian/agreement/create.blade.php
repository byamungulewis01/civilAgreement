@extends('layouts.app')
@section('title') Create Agreement @endsection
@section('css')

@endsection

@section('body')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Create Agreement</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->

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
                    <span class="bs-stepper-title">Review &amp; Complete</span>
                    <span class="bs-stepper-subtitle">Create a deal</span>
                </span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#review-complete">
            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                {{-- <span class="bs-stepper-circle"><i class="ti ti-checkbox ti-sm"></i></span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Review &amp; Complete</span>
                    <span class="bs-stepper-subtitle">Launch a deal!</span>
                </span> --}}
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <form id="wizard-create-deal-form" action="{{ route('civilian.agreement.store') }}" method="post">
            @csrf
            <div id="deal-type" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">

                    <div class="col-12 pb-2">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon checked">
                                    <label class="form-check-label custom-option-content" for="customRadioPercentage">
                                        <span class="custom-option-body">

                                            <span class="custom-option-title">Pay With Me </span>
                                            <small>Chech pay with me in case agreement payment will be done by
                                                you</small>
                                        </span>
                                        <input name="whoToPay" class="form-check-input" type="radio" value="me"
                                            id="customRadioPercentage" checked="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioPrime">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title"> Pay With Other </span>
                                            <small>If you Check pay with other that means payment will not made by
                                                you</small>
                                        </span>
                                        <input name="whoToPay" class="form-check-input" type="radio" value="other"
                                            id="customRadioPrime">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container">
                        <label class="form-label" for="dealAmount">Amount to pay</label>
                        <input type="number" value="{{ old('amount') }}" name="amount" id="dealAmount"
                            class="form-control" placeholder="25,000,000" min="0" max="100000000"
                            aria-describedby="dealAmountHelp">
                        <div id="dealAmountHelp" class="form-text">Enter the agreement amount </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="dealDuration" class="form-label">Agreement Duration</label>
                        <input type="text" id="dealDuration" name="duration" value="{{ old('duration') }}"
                            class="form-control flatpickr-input" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                            readonly="readonly">
                        <div id="dealAmountHelp" class="form-text">Duration between agreement starting to the ending
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-label-secondary btn-prev waves-effect" disabled=""> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button type="button" class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                </div>
            </div>
            <div id="deal-details" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">

                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement Category</label>
                        <input type="text" name="category" value="{{ old('category') }}" id="agreement"
                            class="form-control" placeholder="Agreement" aria-describedby="agreementHelp">
                        <div id="agreementHelp" class="form-text">Describe Agreement Category
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement Description</label>
                        <textarea class="form-control" id="agreement" name="description"
                            rows="5">{{ old('description') }}</textarea>
                        <div id="dsfksdlksdkfs" class="form-text">Description of agreement in deep
                            </div>
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-label-secondary btn-prev waves-effect"> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button type="button" class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                </div>
            </div>
            <div id="deal-usage" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="row g-3">
                    <div class="col-12 mb-0">
                        <h3>Almost done! 🚀</h3>
                        <p>Confirm your deal details information and submit to create it.</p>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="nationalId">Party National ID</label>
                        <input type="text" minlength="16" maxlength="16" id="nationalId" value="{{ old('partyTwo') }}"
                            name="partyTwo" class="form-control" placeholder="00000000000000000">
                         <div id="nationalId" class="form-text">National ID Of Other Party</div>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit waves-effect waves-light"><span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                                class="ti ti-check ti-xs"></i></button>
                    </div>


                </div>
            </div>
            <div id="review-complete" class="content fv-plugins-bootstrap5 fv-plugins-framework">

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
                mode: "range",
                minDate: "today"
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
                    amount: {
                        validators: {
                            notEmpty: {
                                message: "Please enter amount",

                            },
                            numeric: {
                                message: "The amount must be a number"
                            },
                        }
                    },
                    duration: {
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
<script>
    $(document).ready(function () {
        $("#nationalId").keypress(function (e) {
            var inputValue = $(this).val();
            var charCode = String.fromCharCode(e.keyCode);
            // Allow only numeric digits and check the first character
            if (charCode.match(/[^0-9]/g) || (inputValue.length === 0 && !['1', '2'].includes(charCode))) {
                e.preventDefault();
            }
        });
    });
</script>


@endsection
