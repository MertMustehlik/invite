const form = $("#primaryEventInvitationLinkForm"),
    modal = $("#primaryEventInvitationModal");
const eventInvitationClearForm = () => {
    form.find("[name='name']").val("");
    form.find("[name='guest_count']").val("");
}

const createEventInvitation = () => {
    eventInvitationClearForm();

    modal.find('.modal-title').text('Ekle')

    form.attr('action', form.attr('create-action'));


    modal.modal('show');
}

const editEventInvitation = (id) => {
    eventInvitationClearForm();

    $.ajax({
        type: 'GET',
        url: `${form.attr('show-action')}/${id}`,
        dataType: 'json',
        success: function (res) {
            modal.find('.modal-title').text('Güncelle')

            form.attr('action', form.attr('edit-action').replace('id', id));
            form.find("[name='name']").val(res.name);
            form.find("[name='guest_count']").val(res.guest_count);

            modal.modal('show');
        }
    })
}

$(document).ready(function () {
    $(document).on("submit", "#primaryEventInvitationLinkForm", function (e) {
        e.preventDefault();

        let formData = new FormData(this),
            form = $(this),
            submitButton = $(this).find("[type='submit']");

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
                propSubmitButton(submitButton, 1);
            },
            success: function (res) {
                swal.success({
                    message: res.message
                }).then(() => window.location.reload())
            },
            error: function (xhr) {
                swal.error({
                    message: xhr.responseJSON?.message ?? null
                })
            },
            complete: function () {
                propSubmitButton(submitButton, 0);
            }
        })
    })
});