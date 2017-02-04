/* global baseurl */

$('#logout').on('click', (function () {
    $.ajax({
        type: 'POST',
        data: {'_token': csrf},
        url: baseurl + 'auth/logout',
        statusCode: {
            200: function () {
                window.location.assign(baseurl);
            }
        }
    });
}));

$(document).ready(function () {
    $('[id^="select"] option[value=0]').attr("disabled", "disabled");
    $('[id^="select"]').select2({
        placeholder: "Selecteaza o valoare"
    });
});

$('[id^="fileinput"]').fileinput({
    showUpload: false
});

$('[id^="texteditor"]').wysihtml5({

});
  