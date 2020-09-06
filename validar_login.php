<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT * FROM usuarios WHERE email = :email";
    $params = array(array("email", $_POST["email"]));
    $conn->consulta($query, $params);
    $match = $conn->siguienteRegistro();

    $conn->desconectar();

    if ($match) {
        if (md5($_POST["clave"]) == $match["password"]) {
            $_SESSION["tipo_usuario"] = intval($match["usuario_tipo_id"]);
            $_SESSION["usuario_id"] = intval($match["usuario_id"]);
            header("Location: index.php");
        } else {
            $_SESSION["estado_login"] = "clave";
            header("Location: login.php");
        }
    } else {
        $_SESSION["estado_login"] = "email";
        header("Location: login.php");
    }
} else {
    $smarty->display("intruso.tpl");
}
