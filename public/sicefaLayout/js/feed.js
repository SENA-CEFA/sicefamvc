//variable global
var i = 1;
//URI: dirección del RSS 2.0 (funciona con WordPress)
var URI = 'http://centroagroindustrial.blogspot.com/feeds/posts/default';
//función: llamarasincrono('URI', 'div-id',i);
llamarasincrono(URI, 'rss', i);
// Esta función cargará la info
function llamarasincrono(url, id_contenedor, N) {
    var pagina_requerida = false
    if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
        pagina_requerida = new XMLHttpRequest()
    } else if (window.ActiveXObject) { // pero si es IE
        try {
            pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP")
        }
        catch (e) { // en caso que sea una versión antigua
            try {
                pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP")
            }
            catch (e) {
            }
        }
    } else
        return false
    pagina_requerida.onreadystatechange = function () { // función de respuesta
        cargarpagina(pagina_requerida, id_contenedor, N)
    }
    pagina_requerida.open('GET', url, true) // asignamos los métodos open y send
    pagina_requerida.send(null)
}
// todo es correcto y ha llegado el momento de poner la información requerida
// en su sitio en la pagina xhtml
function cargarpagina(pagina_requerida, id_contenedor, N) {
    if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf("http") == -1)) {
        //usamos la propiedad responseXML: devuelve datos por el servidor en forma de documento XML
        var xml = pagina_requerida.responseXML;
        //encontramos el total de items en el RSS
        var limit = xml.getElementsByTagName('item').length;
        //Boton Siguiente
        //i es la variable que irá incrementandose
        var next = "<next><a href=\"javascript:llamarasincrono(URI, 'rss',i);\">Siguiente</a></next>";
        //creamos el string donde irán las etiquetas y los valores
        var rss = "";
        //for de 2 ciclos, para mostrar 2 entradas a la vez
        for (var l = N; l <= N + 1; l++) {
            //cogemos el titulo del primer item, luego del segundo, y así...
            var title = xml.getElementsByTagName('title').item(l).firstChild.data;
            var url = xml.getElementsByTagName('link').item(l).firstChild.data;
            var pubDate = xml.getElementsByTagName('pubDate').item(l).firstChild.data;
            var description = xml.getElementsByTagName('description').item(l).firstChild.data;
            //si la longitud de la entrada es mayor a 200 caracteres la cortamos y le ponemos un enlace
            if (description.length > 200) {
                description = description.substr(0, 200) + "...<br/><enlace><a href=\"" + url + "\">Leer más</a></enlace><br/><br/>";
            } else
                description = description + "<br/><br/>";
            //esto es para cortar el +0000 de la fecha en WordPress
            var date = pubDate.split(" +");
            //sumamos las variables a nuestro string
            rss = rss + "<fecha>" + date[0] + "<fecha><br/><titulo>" + title + "</titulo><br/><descripcion>" + description + "</descripcion>";
            if (limit == l)
                //si nos pasamos del limite, la cortamos
                break;
        }
        //incrementamos la variable global
        i = i + 2;
        //si nos pasamos del límite, volvemos a empezar
        if (i > limit)
            i = 1;
        //metemos el string + el boton en el div-id que corresponde
        document.getElementById(id_contenedor).innerHTML = rss + next;
        //un pequeño mensaje para avisar que se está cargando la info
    } else if (pagina_requerida.readyState == 1)
        document.getElementById(id_contenedor).innerHTML = "<load>Cargando...</load>"
}
