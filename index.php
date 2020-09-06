<?php

require_once("config/configuracion.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
$conn->conectar();

$query = "SELECT * FROM usuarios WHERE usuario_tipo_id != :id";
$params = array(array("id", Administrador));
$conn->consulta($query, $params);
$inscriptos = $conn->cantidadRegistros();

$query = "SELECT * FROM libretas";
$conn->consulta($query);
$con_libreta = $conn->cantidadRegistros();

$conn->desconectar();

$smarty->assign("inscriptos", $inscriptos);
$smarty->assign("con_libreta", $con_libreta);
$smarty->assign("costo", COSTO);
if (!array_key_exists("tipo_usuario", $_SESSION)) {
    $smarty->display("invitado.tpl");
} else {
    switch ($_SESSION["tipo_usuario"]) {
    case Administrador:
        $smarty->display("admin.tpl");
        break;
    case Cliente:
        $smarty->display("cliente.tpl");
        break;
    case Usuario:
        $smarty->display("usuario.tpl");
        break;
    }
}