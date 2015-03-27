$(document).ready(function () {
    $("#btnBuscar").click(function () {
        if ($("#txtDocumento").val().length > 5)
        {
            var url = document.URL;
            var myArray = url.split('/');
            if (myArray.length >= 8) {
                cargadivconsulta('datos', '../buscapersona/' + $("#txtDocumento").val());
            } else {
                cargadivconsulta('datos', 'buscapersona/' + $("#txtDocumento").val());
            }
        }
    });

    $("#resetBtn").click(function () {
        $("#datos").hide();
    });

});