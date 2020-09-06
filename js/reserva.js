function validarReserva() {
    var reserva = new Date($("#fecha").val() + "T13:00:00");
    if (reserva.getDay() === 0 || reserva.getDay() === 6) {
        alert("No se puede reservar clases los sabados ni los domingos");
        return false;
    }
}