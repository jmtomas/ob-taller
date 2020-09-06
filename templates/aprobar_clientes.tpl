<!DOCTYPE html>

<html>
    <head>
        <title>Aprobar clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">

        <script type="text/javascript" src="includes/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <h1>Aprobar clientes</h1>
        <form name="aprobar_clientes" method="POST" action="validar_aprobar_clientes.php">
            {$usuarios}
            <input type="submit" name="aprobar" value="Aprobar">
        </form>
        <a href="index.php">Volver</a>
    </body>
</html>
