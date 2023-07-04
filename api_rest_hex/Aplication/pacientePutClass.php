<?php
require_once "Domain/service/conexion.php";
require_once "Domain/errores.class.php";
include_once 'Interfaces/pacientePutInt.php';

class pacientePutClass extends conexion implements pacientePutInt{
    public function putPaciente($json)
    {
        $_erroresRespuesta = new erroresRespuesta;
        $datos = json_decode($json,true);
        $_paciente = new paciente();
        //if(!isset($datos['token'])){
          //  return $_erroresRespuesta->error_401();
        //}else{
           // $this->token = $datos['token'];
            //$arrayToken =   $this->buscarToken();
            //if($arrayToken){
                if(!isset($datos['pacienteId'])){
                    return $_erroresRespuesta->error_400();
                }else{
                    $_paciente->setPacienteid($datos['pacienteId']);
                    if(isset($datos['nombre'])) {$_paciente -> setNombre($datos['nombre']);}
                    if(isset($datos['dni'])) { $_paciente -> setDni($datos['dni']);}
                    if(isset($datos['correo'])) { $_paciente -> setCorreo($datos['correo']);}
                    if(isset($datos['telefono'])) { $_paciente -> setTelefono($datos['telefono']); }
                    if(isset($datos['direccion'])) { $_paciente -> setDireccion($datos['direccion']) ; }
                    if(isset($datos['codigoPostal'])) { $_paciente -> setCodigoPostal($datos['codigoPostal']) ; }
                    if(isset($datos['genero'])) { $_paciente -> setGenero($datos['genero']) ; }}
                    if(isset($datos['fechaNacimiento'])) { $_paciente -> setFechaNacimiento($datos['fechaNacimiento']) ; }

                    $resp = $this->modificarPaciente();
                    if($resp){
                        $respuesta = $_erroresRespuesta->response;
                        $respuesta["result"] = array(
                            "pacienteId" => $this->pacienteid
                        );
                        return $respuesta;
                    }else{
                        return $_erroresRespuesta->error_500();
                    }
               //}

            //}else{
              //  return $_erroresRespuesta->error_401("El Token que envio es invalido o ha caducado");
            //}

    }
    private function modificarPaciente(paciente $_paciente){
        $query = "UPDATE " . $_paciente->getTable() . " SET Nombre ='" . $_paciente->getNombre() . "',Direccion = '" . $_paciente->getDireccion() . "', DNI = '" . $_paciente->getDni(). "', CodigoPostal = '" .
            $_paciente->getCodigoPostal() . "', Telefono = '" . $_paciente->getTelefono() . "', Genero = '" . $_paciente->getGenero() . "', FechaNacimiento = '" . $_paciente->getFechaNacimiento() . "', Correo = '" . $_paciente->getCorreo() .
            "' WHERE PacienteId = '" . $_paciente->getPacienteid() . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1){
            return $resp;
        }else{
            return 0;
        }
    }
}