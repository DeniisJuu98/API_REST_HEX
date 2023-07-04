<?php
include_once "Aplication/pacienteGetClass.php";


class PacientesUseGet
{
    public function get()
    {
        $_erroresRespuesta = new erroresRespuesta();
        $_getPaciente = new pacienteGetClass();

        if(isset($_GET["page"])){
            $pagina = $_GET["page"];
            $listaPacientes = $_getPaciente->listaPacientes($pagina);
            header("Content-Type: application/json");
            echo json_encode($listaPacientes);
            http_response_code(200);
        }else if(isset($_GET['id'])){
            $pacienteid = $_GET['id'];
            $datosPaciente = $_getPaciente->getPaciente($pacienteid);
            header("Content-Type: application/json");
            echo json_encode($datosPaciente);
            http_response_code(200);
        }

    }
}
?>