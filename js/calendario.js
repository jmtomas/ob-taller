$(document).ready(function () {
    rellenarCalendario();
});

var fecha = new Date();

var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
    "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

function rellenarCalendario() {
    $(".mes .actual").append(meses[fecha.getMonth()]);
    var primerDia = new Date(fecha.getFullYear(), fecha.getMonth(), 1);
    for (var i = 0; i < primerDia.getDay(); i++) {
        $(".dias-mes").append("<li></li>");
    }
    var diaSemana = primerDia.getDay();
    var ultimoDia = new Date(fecha.getFullYear(), fecha.getMonth() + 1, 0);
    for (var i = primerDia.getDate(); i < ultimoDia.getDate() + 1; i++) {
        if (diaSemana === 6 || diaSemana === 0) {
            $(".dias-mes").append("<li>" + i + "</li>");
        } else {
            $(".dias-mes").append("<li id=\"" + i + "\">" + i + "</li>");
        }
        diaSemana = (diaSemana + 1) % 7;
    }
    $.ajax({
        type: "POST",
        dataType: "text",
        url: "calendario.php",
        data: "mes=" + (fecha.getMonth() + 1),
        success: rellenarReservas,
        timeout: 4000
    });
    return false;
}

function rellenarReservas(datos) {
    var d = JSON.parse(datos);
    var reservas = d[0];
    var instructores = d[1];
    var por_dia = d[2];
    var capacidad = 15 * instructores;

    $(".mes .reservas").after("<p>Reservas: " + reservas + "</p>");

    for (var i = 0; i < por_dia.length; i++) {
        if (por_dia[i] < capacidad * 0.5) {
            $(".dias-mes #" + (i + 1)).css("background", "#caffbf");
        } else if (por_dia[i] < capacidad) {
            $(".dias-mes #" + (i + 1)).css("background", "#fdffb6");
        } else {
            $(".dias-mes #" + (i + 1)).css("background", "#ffadad");
        }
    }
    return false;
}