$(document).ready(function () {
    $("#btnBuscar").click(function () {
        if ($("#txtDocumento").val().length > 5)
        {
            cargadivconsulta('datos', 'buscapersona/'+$("#txtDocumento").val());
        }
    });
});