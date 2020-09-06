<?php

session_start();
require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");

define("MOTOR", "mysql");
define("SERVIDOR", "localhost");
define("BASE", "obligatorio");
define("USUARIO", "root");
define("CLAVE", "root");

define("COSTO", "$500");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
$conn->conectar();

$query = "SELECT * FROM usuarios_tipos";
$conn->consulta($query);
foreach ($conn->restantesRegistros() as $registro) {
    define($registro["descripcion"], $registro["usuario_tipo_id"]);
}
define("Invitado", 0);

$conn->desconectar();

$smarty = new Smarty();
$smarty->template_dir = "./templates/";
$smarty->compile_dir = "./templates_c/";
