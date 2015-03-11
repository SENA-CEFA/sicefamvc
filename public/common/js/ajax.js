

function cargadivconsulta(id, url) {
 $("#"+id).show();
    $.ajax({
        type: "POST",
        url: url,
        data: "",
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