<?php

require_once("config/configuracion.php");

if (array_key_exists("usuario_id", $_SESSION)) {
    unset($_SESSION["usuario_id"]);
}

if (array_key_exists("tipo_usuario", $_SESSION)) {
    unset($_SESSION["tipo_usuario"]);
}

header("Location: index.php");