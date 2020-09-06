function validarInscripcion() {
    var fechaActual = new Date();
    var fechaNacimiento = new Date($("#nacimiento").val() + "T13:00:00");
    var cmpAnio = fechaActual.getFullYear() - fechaNacimiento.getFullYear();
    var cmpMes = fechaActual.getMonth() - fechaNacimiento.getMonth();
    var cmpDia = fechaActual.getDate() - fechaNacimiento.getDate();
    var edadLimite = 18;
    if (cmpAnio < edadLimite || cmpAnio === edadLimite && cmpMes < 0 || cmpAnio === edadLimite && cmpMes === 0 && cmpDia < 0) {
        alert("Usted debe ser mayor de 18 años de edad para inscribirse.");
        return false;
    }
    var clave = $("#clave").val();
    if (clave.length < 6) {
        alert("Por favor ingrese una clave mayor a 6 caracteres.");
        return false;
    }
}