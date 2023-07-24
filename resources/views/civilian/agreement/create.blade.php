@extends('layouts.app')
@section('title') Create Agreement @endsection
@section('css')

@endsection

@section('body')

<div class="container">

    <form id="videoForm" action="{{ route('civilian.agreement.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <video id="videoElement" width="400" height="300" autoplay></video>
        <button id="startRecordingBtn">Start Recording</button>
        <input type="hidden" id="videoData" name="videoData">
        <input type="hidden" id="videoDuration" name="videoDuration">
        <button id="submitBtn" type="submit" style="display: none;">Upload Video</button>
    </form>
</div>


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
                        <label class="form-label" for="agreement">Agreement Category</label>
                        <input type="text" name="agreement" id="agreement" class="form-control" placeholder="Agreement"
                            aria-describedby="agreementHelp">
                      </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="agreement">Agreement Description</label>
                        <div id="full-editor">
                            <h6>Quill Rich Text Editor</h6>
                            <p> Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love. </p>
                          </div>
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
                    <div class="col-sm-12">
                        <label class="form-label" for="dealUserType">User Type</label>
                        <input type="number" id="dealUserType" name="dealMaxUsers" class="form-control"
                            placeholder="500">
                    </div>
                    <div class="col-lg-12">
                        {{-- live capture video --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="live-capture">
                                            <div class="live-capture__container">
                                                <video id="video" class="live-capture__video"></video>
                                                <canvas id="canvas" class="live-capture__canvas"></canvas>
                                            </div>
                                            <div class="live-capture__controls">
                                                <button id="startbutton" class="btn btn-primary">Start Recording</button>
                                                <button id="resetbutton" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="live-capture">
                                            <div class="live-capture__container">
                                                <video id="recordedVideo" class="live-capture__video" controls></video>
                                            </div>
                                            <div class="live-capture__controls">
                                                <button id="downloadbutton" class="btn btn-primary">Download</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
<script src="{{ asset('assets/js/forms-editors.js') }}"></script>
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
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>

<script>
    let videoData = null;
    let videoDuration = 30; // Duration in seconds
    let timerId = null;

    function startCountdown() {
        let counter = 1;
        timerId = setInterval(() => {
            if (counter > videoDuration) {
                clearInterval(timerId);
                document.getElementById('videoData').value = videoData;
                document.getElementById('videoDuration').value = videoDuration;
                document.getElementById('submitBtn').click(); // Auto submit form
            } else {
                console.log(counter);
                counter++;
            }
        }, 1000);
    }

    document.getElementById('startRecordingBtn').addEventListener('click', () => {
        const videoElement = document.getElementById('videoElement');

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    videoElement.srcObject = stream;

                    const mediaRecorder = new MediaRecorder(stream);
                    const chunks = [];

                    mediaRecorder.ondataavailable = e => chunks.push(e.data);
                    mediaRecorder.onstop = () => {
                        videoData = URL.createObjectURL(new Blob(chunks));
                    };

                    startCountdown();
                    mediaRecorder.start();
                })
                .catch(err => {
                    console.error('Error accessing webcam:', err);
                });
        }
    });
</script>




@endsection
