@extends('layouts.app')
@section('title') Edit Agreement @endsection
@section('css')

@endsection

@section('body')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit Agreement</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('civilian.agreement.update',$agreement->id) }}" method="post">
                    @csrf
                    @method('PUT')
                <div class="row g-3 mb-3">
                    <div class="col-12 pb-2">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon checked">
                                    <label class="form-check-label custom-option-content" for="customRadioPercentage">
                                        <span class="custom-option-body">

                                            <span class="custom-option-title">Pay With Me </span>
                                            <small>Create a deal which offer uses some % off (i.e 5% OFF) on
                                                total.</small>
                                        </span>
                                        <input name="whoToPay" class="form-check-input" type="radio" value="me"
                                            id="customRadioPercentage" {{ $agreement->whoToPay == 'me' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioPrime">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title"> Pay With Other </span>
                                            <small>Create prime member only deal to encourage the prime members.</small>
                                        </span>
                                        <input name="whoToPay" class="form-check-input" type="radio" value="other"
                                            id="customRadioPrime" {{ $agreement->whoToPay == 'other' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container">
                        <label class="form-label" for="dealAmount">Amount to pay</label>
                        <input type="number" name="amount" value="{{ $agreement->amount }}" id="dealAmount" class="form-control" placeholder="25"
                            min="0" max="100000000" aria-describedby="dealAmountHelp">
                        <div id="dealAmountHelp" class="form-text">Enter the Agreement Amount  10 = 10%</div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="dealDuration" class="form-label">Agreement Duration</label>
                        <input type="text" id="dealDuration" name="duration" value="{{ $agreement->duration }}"  class="form-control flatpickr-input"
                            placeholder="YYYY-MM-DD to YYYY-MM-DD" readonly="readonly">
                            <div id="dealAmountHelp" class="form-text">Enter Agreement Duration</div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement Category</label>
                        <input type="text" name="category" value="{{ $agreement->category }}" id="agreement" class="form-control" placeholder="Agreement"
                            aria-describedby="agreementHelp">
                      </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement Description</label>
                        <textarea class="form-control" id="agreement" name="description" rows="5">{{ $agreement->description }}</textarea>
                      </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-12">
                        <label class="form-label" for="nationalId">Party National ID</label>
                        <input type="text" minlength="16" maxlength="16" id="nationalId"  value="{{ $national_id = ($agreement->partyOne == auth()->guard('civilian')->user()->id) ? $agreement->party2->national_id : $agreement->party1->national_id }}" name="partyTwo" class="form-control"
                            placeholder="00000000000000000">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-primary btn-next waves-effect waves-light"> <span
                                class="align-middle d-sm-inline-block d-none me-sm-1">Save</span> <i
                                class="ti ti-send ti-xs"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
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
