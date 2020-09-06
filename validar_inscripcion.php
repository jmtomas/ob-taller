<?php

require_once("config/configuracion.php");

if ($_POST) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT * FROM usuarios WHERE email = :email";
    $params = array(array("email", $_POST["email"]));
    $conn->consulta($query, $params);

    if ($conn->siguienteRegistro()) {
        $_SESSION["estado_inscripcion"] = "error";
        $conn->desconectar();
        header("Location: inscripcion.php");
    } else {
        $sql = "INSERT INTO usuarios (email, password, nombre, apellido, ci, fecha_nacimiento, direccion, usuario_tipo_id) ";
        $sql .= "VALUES (:email, :clave, :nombre, :apellido, :ci, :nacimiento, :dir, :tipo_id)";
        $params = array(
            array("email", $_POST["email"]),
            array("clave", md5($_POST["clave"])),
            array("nombre", $_POST["nombre"]),
            array("apellido", $_POST["apellido"]),
            array("ci", $_POST["ci"]),
            array("nacimiento", $_POST["nacimiento"]),
            array("dir", $_POST["dir"]),
            array("tipo_id", 2)
        );

        $conn->consulta($sql, $params);
        $conn->desconectar();

        $_SESSION["tipo_usuario"] = Usuario;
        header("Location: index.php");
    }
} else {
    $smarty->display("intruso.tpl");
}