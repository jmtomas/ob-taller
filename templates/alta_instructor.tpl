<!DOCTYPE html>

<html>
    <head>
        <title>Alta de instructor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">
    </head>
    <body>
        <h1>Alta de instructor</h1>
        <form method="POST" action="validar_alta_instructor.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            <label for="nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="nacimiento" name="nacimiento" required><br>
            <label for="ci">Cedula de identidad:</label>
            <input type="text" id="ci" name="ci" required><br>
            <label for="vencimiento">Fecha de vencimiento:</label>
            <input type="date" id="vencimiento" name="vencimiento" required><br>
            <input type="submit" value="Dar de alta">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>