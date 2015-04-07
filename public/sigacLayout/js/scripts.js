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

    $("#vista").on("click", "#btnAddTrimestre", function () {
        cargadivconsulta('vista', 'viewtrimestre', 0);
    });

    $("#vista").on("click", "#btnEditTrimestre", function () {
        cargadivconsulta('vista', 'viewtrimestre/' + $(this).val(), 0);
    });
    
     $('#modaltrimestre').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever') 
        var modal = $(this)
        modal.find('h4').text('¿Esta seguro de eliminar el reg: ' + recipient + '?');
        modal.find('#enviar').attr('href', 'deltrimestre/' + recipient);
    })
    

});