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
    $('[data-toggle="tooltip"]').tooltip();
    $(function () {
        $('#example').popover({
            title: 'Ejemplo',
            placement: 'bottom',
            trigger: 'manual',
            template: '<div class="popover-all"><div class="popover-arrow"></div><div class="popover-inner"><h3 class="popover-title">Example</h3><div class="popover-content"></div></div></div>'
        });

        var timerPopover, popover_parent;

        function hidePopover(elem) {
            $(elem).popover('hide');
        }

        $('#example').hover(
                function () {
                    var self = this;
                    clearTimeout(timerPopover);
                    $('.popover-all').hide(); //Hide any open popovers on other elements.
                    popover_parent = self;
                    $(self).popover('show');
                },
                function () {
                    var self = this;
                    timerPopover = setTimeout(function () {
                        hidePopover(self);
                    }, 50);
                }
        );

        $(document).on({
            mouseenter: function () {
                clearTimeout(timerPopover);
            },
            mouseleave: function () {
                timerPopover = setTimeout(function () {
                    hidePopover(popover_parent);
                }, 50);
            }
        }, '.popover-all');


    });

    $('.hoverToolTip').tooltip({
        title: hoverGetData,
        placement: 'bottom',
        html: true,
        container: 'body',
    });
    var cachedData = Array();

    function hoverGetData() {
        var element = $(this);
        var id = element.data('id');
        var page = element.data('page');
       
       
        if (id in cachedData) {
            return cachedData[id];
        }

        var localData = "error";

        $.ajax(page + id, {
            async: false,
            success: function (data) {
                localData = data;
            }
        });

        cachedData[id] = localData;

        return localData;
    }

});
