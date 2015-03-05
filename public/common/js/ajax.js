

function cargadivconsulta(id, url, img) {
    var documento = $("#txtDocumento").val();
 $("#"+id).show();
    $.ajax({
        type: "POST",
        url: url,
        data: "documento=" + documento,
        success: function (html) {
            if (html == 'true') {
                $("#"+id).html(html);
            }
            else {
                $("#"+id).html(html);
            }
        },
        beforeSend: function ()
        {
            $("#"+id).html("<p class='text-center'><img src='../../public/common/img/ajax-loader.gif'></p>")
        }
    });

}