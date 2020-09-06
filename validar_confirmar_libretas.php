<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    if (!empty($_POST["usuarios"])) {
        foreach ($_POST["usuarios"] as $usuario_id) {
            $sql = "INSERT INTO libretas (fecha, usuario_id) VALUES (CURDATE(), :usuario_id)";
            $params = array(
                array("usuario_id", $usuario_id)
            );
            $conn->consulta($sql, $params);
        }
    }
    $conn->desconectar();

    header("Location: index.php");
} else {
    $smarty->display("intruso.tpl");
}