<!DOCTYPE html>

<html>
    <head>
        <title>Listado de clases</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/procesar_listado.js"></script>
    </head>
    <body>
        <h1>Listado de clases</h1>
        <ul>
            {$clases}
        </ul>
        <form method="POST" action="exportar.php" onsubmit="return procesarListado()">
            <input type="hidden" id="listado" name="listado" value="">
            <input type="submit" value="Exportar PDF">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>