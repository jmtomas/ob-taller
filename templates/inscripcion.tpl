<!DOCTYPE html>

<html>
    <head>
        <title>Inscripcion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/inscripcion.js"></script>
    </head>
    <body>
        <h1>Inscripcion</h1>
        {$mensaje}
        <form name="inscripcion" method="POST" action="validar_inscripcion.php" onsubmit="return validarInscripcion()">
            <label for="email">Correo electronico:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            <label for="ci">Cedula de identidad:</label>
            <input type="text" id="ci" name="ci" required><br>
            <label for="nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="nacimiento" name="nacimiento" required><br>
            <label for="dir">Direccion:</label>
            <input type="text" id="dir" name="dir" required><br>
            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" required><br>
            <input type="submit" value="Inscribirse">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>