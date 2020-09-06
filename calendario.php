<?php

require_once("config/configuracion.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
$conn->conectar();

$mes = (int) $_POST["mes"];
$query = "SELECT * FROM reservas WHERE MONTH(fecha) = :mes";
$params = array(array("mes", $mes));
$conn->consulta($query, $params);

$num_reservas = $conn->cantidadRegistros();
$reservas = $conn->restantesRegistros();

$query = "SELECT * FROM instructores";
$conn->consulta($query);
$instructores = $conn->cantidadRegistros();

$por_dia = array();
for ($i = 0; $i < 31; $i++) {
    $por_dia[$i] = 0;
}

foreach ($reservas as $reserva) {
    $por_dia[date("d", strtotime($reserva["fecha"])) - 1]++;
}

echo json_encode(array($num_reservas, $instructores, $por_dia));
$conn->desconectar();
