<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $sql = "INSERT INTO instructores (nombre, apellido, fecha_nacimiento, ci, vencimiento) ";
    $sql .= "VALUES (:nombre, :apellido, :nacimiento, :ci, :vencimiento)";
    $params = array(
        array("nombre", $_POST["nombre"]),
        array("apellido", $_POST["apellido"]),
        array("nacimiento", $_POST["nacimiento"]),
        array("ci", $_POST["ci"]),
        array("vencimiento", $_POST["vencimiento"])
    );

    $conn->consulta($sql, $params);
    $conn->desconectar();

    header("Location: index.php");
} else {
    $smarty->display("intruso.tpl");
}