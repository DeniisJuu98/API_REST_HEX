<?php
include "Domain/entities/pacienteClass.php";
include "Interfaces/pacientePostInt.php";
include "Domain/errores.class.php";
class pacientePostClass extends conexion implements pacientePostInt {
    public function postPaciente($json)
    {
        $_erroresRespuesta = new erroresRespuesta;
        $datos = json_decode($json,true);

        //if(!isset($datos['token'])){
          //  return $_erroresRespuesta->error_401();
        //}else{

            $_paciente = new paciente();
            //$_paciente -> setToken($datos['token']);


            //$arrayToken = $this->buscarToken();
            //if($arrayToken){
                if(!isset($datos['nombre']) || !isset($datos['dni']) || !isset($datos['correo'])){
                    return $_erroresRespuesta->error_400();
                }else{
                    $_paciente -> setNombre($datos['nombre']);
                    $_paciente -> setDni($datos['dni']);
                    $_paciente -> setCorreo($datos['correo']);
                    if(isset($datos['telefono'])) { $_paciente -> setTelefono($datos['telefono']); }
                    if(isset($datos['direccion'])) { $_paciente -> setDireccion($datos['direccion']) ; }
                    if(isset($datos['codigoPostal'])) { $_paciente -> setCodigoPostal($datos['codigoPostal']) ; }
                    if(isset($datos['genero'])) { $_paciente -> setGenero($datos['genero']) ; }
                    if(isset($datos['fechaNacimiento'])) { $_paciente -> setFechaNacimiento($datos['fechaNacimiento']) ; }
                    $resp = $this->insertarPaciente($_paciente);
                    if($resp){
                        $respuesta = $_erroresRespuesta->response;
                        $respuesta["result"] = array(
                            "pacienteId" => $resp
                        );
                        return $respuesta;
                    }else{
                        return $_erroresRespuesta->error_500();
                    }
                }
            //}else{
              //  return $_erroresRespuesta->error_401("El Token que envio es invalido o ha caducado");
            //}
        //}
    }
    private function insertarPaciente(paciente $paciente){
        $query = "INSERT INTO pacientes (DNI,Nombre,Direccion,CodigoPostal,Telefono,Genero,FechaNacimiento,Correo)values('" . $paciente->getDni() . "','" . $paciente->getNombre() . "','" . $paciente->getDireccion() ."','" . $paciente->getCodigoPostal() . "','"  . $paciente->getTelefono() . "','" .$paciente->getGenero(). "','" . $paciente->getFechaNacimiento() . "','" . $paciente->getCorreo() . "')";
        $resp = parent::nonQueryId($query);
        if($resp){
            return $resp;
        }else{
            return 0;
        }
    }
    //private function buscarToken(paciente $paciente){
        //$query = "SELECT  TokenId,UsuarioId,Estado from usuarios_token WHERE Token = '" . "$paciente->getToken()" . "' AND Estado = 'Activo'";
        //$resp = parent::obtenerDatos($query);
        //if($resp){
        //    return $resp;
        //}else{
       //     return 0;
       // }
   // }
}