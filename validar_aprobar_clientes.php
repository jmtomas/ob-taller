<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    if (!empty($_POST["usuarios"])) {
        foreach ($_POST["usuarios"] as $usuario_id) {
            $sql = "UPDATE usuarios SET usuario_tipo_id = :tipo_id WHERE usuario_id = :id";
            $params = array(
                array("tipo_id", Cliente),
                array("id", $usuario_id)
            );
            $conn->consulta($sql, $params);
        }
    }
    $conn->desconectar();

    header("Location: index.php");
} else {
    $smarty->display("intruso.tpl");
}