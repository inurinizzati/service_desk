"use strict";

var KTModalNewTicket = function () {
    var submitButton;
    var cancelButton;
    var validator;
    var form;

    var handleForm = function() {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Ticket title is required'
                            }
                        }
                    },
                    product: {
                        validators: {
                            notEmpty: {
                                message: 'Category is required'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Description is required'
                            }
                        }
                    },
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'Location is required'
                            }
                        }
                    },
                    due_date: {
                        validators: {
                            notEmpty: {
                                message: 'Date is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        submitButton.addEventListener('click', function (e) {
    e.preventDefault();

    validator.validate().then(function (status) {
        if (status === 'Valid') {
            // Show spinner
            submitButton.setAttribute('data-kt-indicator', 'on');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Simulate async request (e.g., AJAX)
            setTimeout(function () {
                // Hide spinner
                submitButton.removeAttribute('data-kt-indicator');
                submitButton.disabled = false;

                // Show success message
                Swal.fire({
                    text: "Ticket has been successfully submitted!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-info"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        // Optional: clear form
                        form.reset();
                        // Optional: reload page
                        // window.location.href = "/ticketlistdata";
                    }
                });
            }, 2000); // simulate 2s delay
        } else {
            Swal.fire({
                text: "Please fill in all required fields.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-info"
                }
            });
        }
    });
});

cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-info",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					// modal.hide(); // Hide modal
                    window.location.href = "/ticketlistdata";
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-info",
						}
					});
				}
			});
		});
	}

    return {
        init: function () {
            form = document.querySelector('#kt_modal_new_ticket_form');
            submitButton = document.getElementById('kt_modal_new_ticket_submit');
            cancelButton = document.getElementById('kt_modal_new_ticket_cancel');

            handleForm();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTModalNewTicket.init();
});
