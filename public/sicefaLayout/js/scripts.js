$(document).ready(function () {
    $("#chkAnonimo").change(function () {
        if ($("#chkAnonimo").is(':checked')) {
            $("#txtDocumento").attr("disabled", "disabled");
            $('#txtDocumento').val("");
            $("#txtNombre").attr("disabled", "disabled");
            $('#txtNombre').val("");
            $("#txtCelular").attr("disabled", "disabled");
            $('#txtCelular').val("");
            $("#txtCorreo").attr("disabled", "disabled");
            $('#txtCorreo').val("");
        } else {
            $("#txtDocumento").removeAttr("disabled");
            $("#txtNombre").removeAttr("disabled");
            $("#txtCelular").removeAttr("disabled");
            $("#txtCorreo").removeAttr("disabled");
        }
    });
});
