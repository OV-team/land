$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    //Modal handler
    $('.delete_ar_handler').click(function () {
        var $modal = $($(this).attr('data-target'));
        $modal.find('#delete-link').attr('href', $(this).attr('href'));
        $modal.modal();
        return false;
    })

});