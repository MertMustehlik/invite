"use strict";
var KTCreateApp = function () {
    var modalElement, stepperElement, formElement, submitButton, nextButton, stepperInstance, validators = [];
    return {
        init: function () {
            modalElement = document.querySelector("#kt_create_wedding_stepper");
            if (modalElement) {
                stepperElement = document.querySelector("#kt_create_wedding_stepper");
                formElement = document.querySelector("#kt_create_wedding_form");
                submitButton = stepperElement.querySelector('[data-kt-stepper-action="submit"]');
                nextButton = stepperElement.querySelector('[data-kt-stepper-action="next"]');
                stepperInstance = new KTStepper(stepperElement);

                // Step değiştiğinde tetiklenecek olay
                stepperInstance.on("kt.stepper.changed", function () {
                    console.log('1231321')
                    if (stepperInstance.getCurrentStepIndex() === 1) {
                        submitButton.classList.add("d-none");
                        nextButton.classList.remove("d-none");
                    } else if (stepperInstance.getCurrentStepIndex() === 2) {
                        submitButton.classList.add("d-none");
                        nextButton.classList.remove("d-none");
                    }
                    else if (stepperInstance.getCurrentStepIndex() === 4) {
                        submitButton.classList.remove("d-none");
                        nextButton.classList.add("d-none");
                    }
                });

                // Next butonu tıklanınca
                stepperInstance.on("kt.stepper.next", function (e) {
                    console.log("stepper.next", e.getCurrentStepIndex() - 1);
                    var currentValidator = validators[e.getCurrentStepIndex() - 1];
                    if (currentValidator) {
                        currentValidator.validate().then(function (validationResult) {
                            console.log("validated!");
                            if (validationResult === "Valid") {
                                e.goNext();
                            } else {
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-light" }
                                });
                            }
                        });
                    } else {
                        e.goNext();
                        KTUtil.scrollTop();
                    }
                });

                // Prev butonu tıklanınca
                stepperInstance.on("kt.stepper.previous", function (e) {
                    e.goPrevious()
                });

                // Submit butonu tıklanınca
                submitButton.addEventListener("click", function (e) {
                    validators[1].validate().then(function (validationResult) {
                        console.log("validated!");
                        if (validationResult === "Valid") {
                            e.preventDefault();
                            submitButton.disabled = true;
                            submitButton.setAttribute("data-kt-indicator", "on");
                            alert('save endpoint gelecek')
                            // setTimeout(function () {
                            //     submitButton.removeAttribute("data-kt-indicator");
                            //     submitButton.disabled = false;
                            //     stepperInstance.goNext();
                            // }, 2000);
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-light" }
                            }).then(function () {
                                KTUtil.scrollTop();
                            });
                        }
                    });
                });

                // Validasyonları tanımla
                validators.push(FormValidation.formValidation(formElement, {
                    fields: {
                        service_id: { validators: { notEmpty: { message: "Hizmet seçimi zorunlu" } } },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".field-area",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                }));
                validators.push(FormValidation.formValidation(formElement, {
                    fields: {
                        employee_id: { validators: { notEmpty: { message: "Çalışan seçimi zorunlu" } } },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".field-area",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                }));
            }
        }
    }
}();

let serviceField = $('#kt_create_wedding [name="service_id"]'),
    adminField = $('#kt_create_wedding [name="admin_id"]');

$(document).on('change', '#kt_create_wedding [name="service_id"]', function (){
    $.ajax({
        type: 'GET',
        url: $('[name="getAdminsForService"]').val(),
        data: {
            service_id: $(this).val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
            let selectEl = $('[name="admin_id"]');
            selectEl.empty();

            selectEl.append($('<option>', {
                value: '',
                text: ''
            }));

            $.each(res, function(index, admin) {
                selectEl.append($('<option>', {
                    value: admin.id,
                    text: `${admin.first_name} ${admin.last_name}`
                }));
            });
        },
        error: function(xhr, status, error) {
            console.log("Error response:", xhr);
            console.log("Status:", status);
            console.log("Error:", error);
        }
    });
})
$(document).on('change', '#kt_create_wedding [name="date"]', function (){
    $.ajax({
        type: 'GET',
        url: $('[name="getAvailableHoursForService"]').val(),
        data: {
            service_id: serviceField.val(),
            admin_id: adminField.val(),
            date: $(this).val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
            //
        },
        error: function(xhr, status, error) {
            console.log("Error response:", xhr);
            console.log("Status:", status);
            console.log("Error:", error);
        }
    });
})
KTUtil.onDOMContentLoaded(function () {
    KTCreateApp.init();
});