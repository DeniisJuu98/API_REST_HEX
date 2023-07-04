<?php
include_once "Aplication/pacientePutClass.php";


class PacientesUsePut
{
    public function put()
    {
        $_putPaciente = new pacientePutClass();

        //recibimos los datos enviados
        $postBody = file_get_contents("php://input");
        //enviamos datos al manejador
        $datosArray = $_putPaciente->putPaciente($postBody);
        //delvovemos una respuesta
        header('Content-Type: application/json');
        if(isset($datosArray["result"]["error_id"])){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);

    }
}
?>