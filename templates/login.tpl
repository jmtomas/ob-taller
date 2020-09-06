<!DOCTYPE html>

<html>
    <head>
        <title>Inicio de sesion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">
    </head>
    <body>
        <h1>Inicio de sesion</h1>
        {$mensaje}
        <form method="POST" action="validar_login.php">
            <label for="email">Correo electronico:</label>
            <input type="text" id="email" name="email" required><br>
            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" required><br>
            <input type="submit" value="Iniciar sesion">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>