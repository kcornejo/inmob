function kenStars() {
    $(".star").each(function () {
        $(this).barrating({
            theme: 'css-stars',
            showSelectedRating: false
        });
    });
}
function imagen(){
    $(".fancybox").fancybox();
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
//    kenStars();
    BusquedaLlenaSelect();
    imagen();
});