function procesarListado() {
    var output = "";
    $("li").each(function () {
        output += $(this).text() + "\n";
    });
    $("#listado").val(output);
}