<?php

require_once("config/configuracion.php");

if (array_key_exists("tipo_usuario", $_SESSION) && $_SESSION["tipo_usuario"] == Cliente) {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASE, USUARIO, CLAVE);
    $conn->conectar();

    $query = "SELECT * FROM usuarios WHERE usuario_tipo_id = :tipo_id AND usuario_id = :id";
    $params = array(
        array("tipo_id", Cliente),
        array("id", $_SESSION["usuario_id"])
    );
    $conn->consulta($query, $params);

    if ($conn->siguienteRegistro()) {
        $smarty->assign("usuario_id", $_SESSION["usuario_id"]);

        if (!array_key_exists("estado_reserva", $_SESSION)) {
            $smarty->assign("mensaje", "");
        } else {
            switch ($_SESSION["estado_reserva"]) {
                case "error":
                    $smarty->assign("mensaje", "<p>Error: Esta combinacion de Fecha, hora e instructor ya esta reservada.</p>");
                    break;
                case "suceso":
                    $smarty->assign("mensaje", "<p>Ha reservado una clase con exito.</p>");
                    break;
            }
        }
        unset($_SESSION["estado_reserva"]);

        $instructores = "";
        $query = "SELECT * FROM instructores";
        $conn->consulta($query);
        foreach ($conn->restantesRegistros() as $registro) {
            $instructores .= "<option value=\"" . $registro["instructor_id"] . "\">" . $registro["nombre"] . " " . $registro["apellido"] . "</option>";
        }
        $smarty->assign("instructores", $instructores);

        $conn->desconectar();
        $smarty->display("reserva.tpl");
    } else {
        $conn->desconectar();
        $smarty->display("intruso.tpl");
    }
} else {
    $smarty->display("intruso.tpl");
}
