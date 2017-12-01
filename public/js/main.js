$( "#form" ).submit(function( event ) {

    event.preventDefault();

    $.ajax({
        async: true,
        dataType: "json",
        type: "POST",
        contentType: false,
        url: 'upload',
        data: new FormData($("#form")[0]),
        processData: false,
        success: function (data) {
            $('.status').empty();
            $('.status').html(data['text']);
        },
        error: function (data) {
            $('.status').empty();
            $('.status').html("wypelnij poprawnie formularz");
        },
        timeout: 10000
    });

});