<?php

require_once("config/configuracion.php");

if (array_key_exists("tipo_usuario", $_SESSION) && $_SESSION["tipo_usuario"] == Administrador) {
    $smarty->display("alta_instructor.tpl");
} else {
    $smarty->display("intruso.tpl");
}