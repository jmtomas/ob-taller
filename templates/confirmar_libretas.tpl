<!DOCTYPE html>

<html>
    <head>
        <title>Confirmar libretas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <h1>Confirmar libretas</h1>
        <form name="confirmar_libretas" method="POST" action="validar_confirmar_libretas.php">
            {$usuarios}
            <input type="submit" name="confirmar" value="Confirmar">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>
