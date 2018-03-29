function kenStars() {
    $(".star").each(function () {
        $(this).barrating({
            theme: 'css-stars',
            showSelectedRating: false
        });
    });
}
function imagen() {
    $(".fancybox").fancybox();
}
function kenCkeditor() {
    $('.ckeditor').each(function () {
        $(this).ckeditor();
    });
}
function BusquedaLlenaSelect() {
    $(".velLlenaSelect").each(function () {
        var id_origen = "#" + $(this).attr("id");
        var id_destino = "#" + $(this).attr("destino");
        var url = $(this).attr("url");
        llenaSelect(id_origen, id_destino, url);
        $(this).on("change", function () {
            llenaSelect(id_origen, id_destino, url);
        });
    });
}
function numero(objeto) {
    var valor = objeto.val();
    valor = limpieza_coma(valor);
    decimal = valor.split('.');
    valor = decimal[0];
    var nuevo_valor = '';
    var contador = 0;
    for (var i = valor.length; i >= 0; i--) {
        nuevo_valor = valor.substring(i, i + 1) + nuevo_valor;
        if (contador == 3 && i != 0) {
            contador = 0;
            nuevo_valor = ',' + nuevo_valor;
        }
        contador++;
    }
    if (1 in decimal) {
        nuevo_valor = nuevo_valor + '.' + decimal[1];
    }
    objeto.val(nuevo_valor);
}
function limpieza_coma(valor) {
    valor = String(valor);
    do {
        valor = valor.replace(",", "");
    } while (valor.includes(','));
    return valor;
}
function llenaSelect(id_origen, id_destino, url) {
    var valor_origen = $(id_origen).val();
    var valor_viejo = $(id_destino).val();
    var actualiza = 0;
    $.get(url, {"valor": valor_origen}, function (respuesta) {
        $(id_destino).empty();
        $.each(respuesta, function (i, item) {
            $(id_destino).append("<option value=" + i + ">" + item + "</option>")
            if (i == valor_viejo && valor_viejo != "") {
                actualiza = 1;

            }
        });
        if (actualiza == 1) {
            $(id_destino).val(valor_viejo);
        }
    }, 'json');

}

$(document).ready(function () {
    $("form").each(function () {
        $(this).on('submit', function () {
            $(".ken_number").each(function () {
                var objeto = $(this);
                objeto.val(limpieza_coma(objeto.val()));
            });
        });
    });
    BusquedaLlenaSelect();
    imagen();
    kenCkeditor();
    $(".ken_number").each(function () {
        numero($(this));
    });
    $(".ken_number").on('input', function () {
        numero($(this));
    });
});