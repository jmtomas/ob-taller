<?php

require_once("config/configuracion.php");

if (!array_key_exists("estado_inscripcion", $_SESSION)) {
    $smarty->assign("mensaje", "");
} else if ($_SESSION["estado_inscripcion"] == "error") {
    $smarty->assign("mensaje", "<p>Error: Correo electronico ya ingresado.</p>"
            . "<p>Por favor ingrese otro correo electronico.</p>");
}
unset($_SESSION["estado_inscripcion"]);
$smarty->display("inscripcion.tpl");
