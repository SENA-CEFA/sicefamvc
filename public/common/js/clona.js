$(function () {
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#agregar").on('click', function () {
        original = $("#tabla tbody tr.fila-base");
        fila = original.clone();
        $(':input', fila).each(function () {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
//limpiamos los valores de los campos…
            if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
// excepto de los checkboxes y radios, le quitamos el checked
// pero su valor no debe ser cambiado
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
// los selects le ponesmos el indice a -
            else if (tag == 'select')
                this.selectedIndex = 0;
        });

        fila.removeClass('fila-base');
        fila.show();
        fila.appendTo("#tabla tbody");
    });



    // Evento que selecciona la fila y la elimina 
    $(document).on("click", ".eliminar", function () {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });


});