<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT * FROM usuarios WHERE usuario_tipo_id = :tipo_id AND usuario_id = :id";
    $params = array(
        array("tipo_id", Cliente),
        array("id", $_SESSION["usuario_id"])
    );
    $conn->consulta($query, $params);

    if ($conn->siguienteRegistro()) {

        $query = "SELECT * FROM reservas WHERE fecha = :fecha AND hora = :hora AND instructor_id = :instructor_id;";
        $params = array(
            array("fecha", $_POST["fecha"]),
            array("hora", $_POST["hora"]),
            array("instructor_id", $_POST["instructor"])
        );
        $conn->consulta($query, $params);

        if (!$conn->siguienteRegistro()) {
            $sql = "INSERT INTO reservas (fecha, hora, instructor_id, usuario_id) ";
            $sql .= "VALUES (:fecha, :hora, :instructor_id, :usuario_id)";
            $params = array(
                array("fecha", $_POST["fecha"]),
                array("hora", $_POST["hora"]),
                array("instructor_id", $_POST["instructor"]),
                array("usuario_id", $_SESSION["usuario_id"])
            );
            $conn->consulta($sql, $params);
            $_SESSION["estado_reserva"] = "suceso";
        } else {
            $_SESSION["estado_reserva"] = "error";
        }
        $conn->desconectar();
        header("Location: reserva.php");
    } else {
        $conn->desconectar();
        $smarty->display("intruso.tpl");
    }
} else {
    $smarty->display("intruso.tpl");
}