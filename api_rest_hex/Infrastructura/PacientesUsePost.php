<?php
include_once "Aplication/pacientePostClass.php";


class PacientesUsePost
{
    public function post()
    {
    $_postPaciente = new pacientePostClass();

        //recibimos los datos enviados
        $postBody = file_get_contents("php://input");
        //enviamos los datos al manejador
        $datosArray = $_postPaciente->postPaciente($postBody);

        //delvovemos una respuesta
        header('Content-Type: application/json');
        if (isset($datosArray["result"]["error_id"])) {
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        } else {
            http_response_code(200);
        }
        echo json_encode($datosArray);

    }
}
?>