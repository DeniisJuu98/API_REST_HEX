<?php
include_once "Aplication/pacienteDeleteClass.php";
include_once "Domain/errores.class.php";

class PacientesUseDelete
{
    public function delete()
    {
        $_deletePaciente = new pacienteDeleteClass();

        if(isset($_GET['pacienteId'])) {
            $pacienteid = $_GET['pacienteId'];
            //enviamos datos al manejador
            $datosArray = $_deletePaciente->deletePaciente($pacienteid);
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
}
?>