<!DOCTYPE html>

<html>
    <head>
        <title>Nueva reserva</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/reserva.js"></script>
    </head>
    <body>
        <h1>Nueva reserva</h1>
        {$mensaje}
        <form name="reserva" method="POST" action="validar_reserva.php" onsubmit="return validarReserva()">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>
            <label for="hora">Hora:</label>
            <input type="number" id="hora" name="hora" min="7" max="21" value="7" required><br>
            <label for="instructor">Seleccione un instructor:</label>
            <select name="instructor" id="instructor">
                {$instructores}
            </select><br>
            <input type="submit" value="Hacer reserva">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>