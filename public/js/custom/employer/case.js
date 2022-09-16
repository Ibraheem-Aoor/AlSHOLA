$(document).ready(function () {
    $('select[name="application_id"]').on('change', function () {
        $.ajax({
            url: $(this).attr('data-route'),
            type: "POST",
            data: { application_id: $(this).val() },
            success: function (response) {
                if (response.status) {
                    $('#application_details').html(response.view);
                }
            }, error: function (response) {

            },
        });
    });
});
