<?php

require_once("config/configuracion.php");

if (array_key_exists("tipo_usuario", $_SESSION) && $_SESSION["tipo_usuario"] == Administrador) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT * FROM usuarios WHERE usuario_tipo_id = :id";
    $params = array(
        array("id", Usuario)
    );
    $conn->consulta($query, $params);

    $usuarios = "";
    foreach ($conn->restantesRegistros() as $registro) {
        $usuarios .= "<input type=\"checkbox\" name=\"usuarios[]\" value=\"" . $registro["usuario_id"] . "\"> ";
        $usuarios .= "<label>" . $registro["nombre"] . " " . $registro["apellido"] . "</label><br><br>";
    }
    $smarty->assign("usuarios", $usuarios);

    $conn->desconectar();

    $smarty->display("aprobar_clientes.tpl");
} else {
    $smarty->display("intruso.tpl");
}