

function cargadivconsulta(id, url, arg, data) {
 $("#"+id).show();
    $.ajax({
        type: "POST",
        url: url,
        data: data,
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
            if(arg==0)
            {
            $("#"+id).html("<p class='text-center'><img src='../../public/common/img/ajax-loader.gif'></p>")
        }else{
            $("#"+id).html("<p class='text-center'><img src='../../../public/common/img/ajax-loader.gif'></p>")
        }
        }
    });

}