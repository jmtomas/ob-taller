<!DOCTYPE html>

<html>
    <head>
        <title>Obligatorio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/calendario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/calendario.js"></script>
    </head>
    <body>
        <div class="encabezado">
            <h1>Academia de Conductores</h1>
            <p>Usuarios inscriptos: {$inscriptos}</p>
            <p>Usuarios con libreta: {$con_libreta}</p>
        </div>
        {include "calendario.tpl"}
        <div class="principal">
            <p>Inscribase para poder reservar clases.</p>
            <p>El costo de las clases es: {$costo}.</p>
            <p>
                <a href="inscripcion.php">Inscribirse</a>
                <a href="login.php">Iniciar Sesion</a>
            </p>
        </div>
    </body>
</html>