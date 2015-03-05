function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function MostrarConsulta(datos) {
    divResultado = document.getElementById('resultado');
    ajax = objetoAjax();
    ajax.open("GET", datos);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}

function cargadivconsulta(id, archivo) {
    divResultado = document.getElementById(id);
    divPreloader = document.getElementById('preloader');
    ajax = objetoAjax();
    ajax.open("GET", archivo);
    ajax.onreadystatechange=procesarPeticion;
    ajax.send(null);
    
    function procesarPeticion () {
        if (ajax.readyState == 1) {
            divResultado.innerHTML = "Cargando...";
        } else if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                divResultado.innerHTML = ajax.responseText;
            } else if (ajax.status == 404) {
                divResultado.innerHTML = "Página no encotrada";
            } else {
                divResultado.innerHTML = "Error";
            }
        }
    }
}