<?php

require_once("config/configuracion.php");
if (!array_key_exists("estado_login", $_SESSION)) {
    $smarty->assign("mensaje", "");
} else {
    switch ($_SESSION["estado_login"]) {
        case "email":
            $smarty->assign("mensaje", "<p>Error: Correo electronico invalido</p>");
            break;
        case "clave":
            $smarty->assign("mensaje", "<p>Error: Clave invalida</p>");
            break;
    }
}
unset($_SESSION["estado_login"]);
$smarty->display("login.tpl");
