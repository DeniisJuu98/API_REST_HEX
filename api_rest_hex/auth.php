<?php
require_once 'Domain/auth.class.php';
require_once 'Domain/errores.class.php';

$_auth = new auth;
$_erroresRespuesta = new erroresRespuesta;

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //recibir datos
    $postBody = file_get_contents("php://input");
    //enviar datos
    $datosArray = $_auth->login($postBody);
    //devolver respuesta
    header('Content-Type: application/json');
    if (isset($datosArray["result"]["error_id"])){
        $responseCode = $datosArray["result"]["error_id"];
        http_response_code($responseCode);
    }else{
        http_response_code(200);
    }
    echo json_encode($datosArray);
}else{
    header('Content-Type: application/json');
    $datosArray = $_erroresRespuesta->error_405();
    echo json_encode($datosArray);
}
?>