
$(document).ready(function () {
    $("#cmbTitulacion").change(function () {
        if ($("#cmbTitulacion").val())
        {
            cargadivconsulta('datos', 'listaaprendices/'+$("#cmbTitulacion").val());
        }
    });
});




$(document).ready(function() {
    $(".btnPrint").printPage();
  });