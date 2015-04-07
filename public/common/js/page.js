$(document).ready(function () {
    window.onload = cerrar;
    function cerrar() {
        $("#carga").animate({"opacity": "0"}, 1000, function () {
            $("#carga").css("display", "none");
        });
    }
    $("#carga").click(function () {
        cerrar();
    });
//**************************************** ANIMACION OCULTA MENSAJE**********************************************************
    setTimeout(function () {
        $("#mensaje").fadeOut(1500);
    }, 4000);

    if (history.forward(1)){
        location.replace(history.forward(1));
    }
});

