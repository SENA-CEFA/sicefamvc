$(document).ready(function () {
    $("#btnBuscar").click(function () {
        if ($("#txtNombreTipo").val())
        {
            cargadivconsulta('datos', 'buscapersona/'+$("#txtNombreTipo").val());
        }
    });
});


$(document).ready(function() {
    $(".btnPrint").printPage();
  });