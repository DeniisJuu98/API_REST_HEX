<?php
require_once "Domain/service/conexion.php";
require_once "Domain/errores.class.php";
include_once 'Interfaces/pacienteDeleteInt.php';
class pacienteDeleteClass extends conexion implements pacienteDeleteInt {
    public function deletePaciente($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        $_paciente = new paciente();
        //if(!isset($datos['token'])){
          //  return $_respuestas->error_401();
        //}else{
          //  $this->token = $datos['token'];
            //$arrayToken =   $this->buscarToken();
            //if($arrayToken){

                if(!isset($datos['pacienteId'])){
                    return $_respuestas->error_400();
                }else{
                    $_paciente->setPacienteid($datos['pacienteId']);
                    $resp = $this->eliminarPaciente($_paciente);
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "pacienteId" => $this->pacienteid
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
              //      }
               // }

           // }else{
             //   return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }
    }
        private function eliminarPaciente(paciente $_paciente){
        $query = "DELETE FROM pacientes WHERE PacienteId= '" . $_paciente->getPacienteid() . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
        }
    }


}
