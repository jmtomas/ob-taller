<!DOCTYPE html>

<html>
    <head>
        <title>Listado de clases</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">
    </head>
    <body>
        <h1>Listado de clases</h1>
        <form method="POST" action="generar_listado.php">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>
            <label for="instructor">Seleccione un instructor:</label>
            <select name="instructor" id="instructor">
                {$instructores}
            </select><br>
            <input type="submit" value="Generar listado">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>