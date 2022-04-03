$("#new_otz").on('submit', function () {


    var frm = $(this);

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/ajax/",
        data: frm.serialize(),
        success: function (response) {
            if (response.success) {
                frm.hide();
                $('#success_' + frm.attr('id')).show();

            }
            if (response.error) {
                if (response.error != 1) {
                    $('.error_main_text').html(response.error)
                }
                $('#error_' + frm.attr('id')).show();

                setTimeout(function () {
                    $('#error_' + frm.attr('id')).fadeOut('fast');
                }, 2000);

            }
            return false;
        }
    });

    return false;

})
$("#rest_info").on('submit', function () {


    var frm = $(this);

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/ajax/",
        data: frm.serialize(),
        success: function (response) {
            if (response.STATUS=='success') {

                $('#rest_success').show();
                setTimeout(function () {
                    $('#rest_success').hide();
                }, 4000);
            }

            return false;
        }
    });

    return false;

})