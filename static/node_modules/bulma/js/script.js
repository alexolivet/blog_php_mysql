$(document).ready(function() {

    //detect any changes made to form
    $('form').on('keyup change', 'input, select, textarea', function() {
        $('.myButton').removeAttr('disabled');
    });
    //detect any changes made within the CKEDITOR
    for (var i in CKEDITOR.instances) {
        CKEDITOR.instances[i].on('change', function() {
            $('.myButton').removeAttr('disabled');
        });
    }

});