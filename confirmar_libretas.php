<?php

require_once("config/configuracion.php");

if (array_key_exists("tipo_usuario", $_SESSION) && $_SESSION["tipo_usuario"] == Administrador) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT u.usuario_id, u.nombre, u.apellido, COUNT(*) FROM usuarios u, reservas r ";
    $query .= "WHERE u.usuario_id = r.usuario_id AND r.fecha < CURDATE() ";
    $query .= "AND u.usuario_id NOT IN (SELECT usuario_id FROM libretas) ";
    $query .= "GROUP BY usuario_id";
    $conn->consulta($query);

    $usuarios = "";
    foreach ($conn->restantesRegistros() as $registro) {
        if ($registro["COUNT(*)"] >= 15) {
            $usuarios .= "<input type=\"checkbox\" name=\"usuarios[]\" value=\"" . $registro["usuario_id"] . "\"> ";
            $usuarios .= "<label>" . $registro["nombre"] . " " . $registro["apellido"] . "</label><br><br>";
        }
    }
    $smarty->assign("usuarios", $usuarios);

    $conn->desconectar();

    $smarty->display("confirmar_libretas.tpl");
} else {
    $smarty->display("intruso.tpl");
}