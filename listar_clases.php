<?php

require_once("config/configuracion.php");

if (array_key_exists("tipo_usuario", $_SESSION) && $_SESSION["tipo_usuario"] == Administrador) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $instructores = "";
    $query = "SELECT * FROM instructores";
    $conn->consulta($query);
    foreach ($conn->restantesRegistros() as $registro) {
        $instructores .= "<option value=\"" . $registro["instructor_id"] . "\">" . $registro["nombre"] . " " . $registro["apellido"] . "</option>";
    }
    $smarty->assign("instructores", $instructores);
    
    $conn->desconectar();
    $smarty->display("listar_clases.tpl");
} else {
    $smarty->display("intruso.tpl");
}