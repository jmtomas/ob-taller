<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT r.hora, u.nombre, u.apellido, u.direccion FROM usuarios u, reservas r ";
    $query .= "WHERE r.fecha = :fecha AND r.instructor_id = :instructor_id AND u.usuario_id = r.usuario_id ";
    $query .= "ORDER BY r.hora";
    $params = array(
        array("fecha", $_POST["fecha"]),
        array("instructor_id", $_POST["instructor"])
    );
    
    $conn->consulta($query, $params);
    
    $clases = "";
    foreach ($conn->restantesRegistros() as $registro) {
        $clases .= "<li>Hora: " . $registro["hora"];
        $clases .= "    Nombre cliente:" . $registro["nombre"] . " " . $registro["apellido"];
        $clases .= "    Direccion: " . $registro["direccion"] . "</li><br>";
    }
    $smarty->assign("clases", $clases);
    
    $conn->desconectar();
    $smarty->display("generar_listado.tpl");
} else {
    $smarty->display("intruso.tpl");
}