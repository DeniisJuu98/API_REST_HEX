<?php
require_once 'service/conexion.php';
require_once 'errores.class.php';

class auth extends conexion{

    public function login($json){
        $_erroresRespuesta = new erroresRespuesta;

        //pasa a la variable datos, los datos json
        $datos = json_decode($json,true);
        if (!isset($datos['usuario'])||!isset($datos['password'])){
            //error
            return $_erroresRespuesta->error_400();
        }else{
            //funciona
            $usuario = $datos['usuario'];
            $password = $datos['password'];
            $password = parent::encriptar($password);
            $datos = $this->obtenerUsuario($usuario);
            if ($datos){
                //si existe
                if ($password==$datos[0]['Password']){
                    if ($datos[0]['Estado']=="Activo"){
                        //Token
                        $verificar= $this->creatToken($datos[0]['UsuarioId']);
                        if ($verificar){
                            //si se guarda el token creado
                            $resultado = $_erroresRespuesta->response;
                            $resultado["result"] = array(
                                "token" => $verificar
                            );
                            return $resultado;
                        }else{
                            return $_erroresRespuesta->error_500("Error interno");
                        }
                    }else {
                        return $_erroresRespuesta->error_200("El usuario no es activo");
                    }
                }else{
                    return $_erroresRespuesta->error_200("La contraseña no es correcta");
                }
            }else{
                //no existe
                return $_erroresRespuesta->error_200("No existe el usuairo: ".$usuario);
            }
        }
    }

    private function obtenerUsuario($usu){
        $query = "SELECT UsuarioId,Password,Estado FROM usuarios WHERE Usuario = '$usu'";
        $datos = parent::obtenerDatos($query);
        if(isset($datos[0]["UsuarioId"])){
            return $datos;
        }else{
            return 0;
        }
    }

    private function creatToken($usuarioId){
        //se crea val con boolean porque la funcion openssl_random_pseudo_bytes no admite, poner un booleano directamente.
        $val = true;
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
        $date = date("Y-m-d H:i");
        $estado = "Activo";
        $query = "INSERT INTO usuarios_token (UsuarioId,Token,Estado,Fecha)VALUES('$usuarioId','$token','$estado','$date')";
        //metodo para verificar si hay filas afectadas
        $verifica = parent::nonQuery($query);
        if($verifica){
            return $token;
        }else{
            return 0;
        }
    }
}
?>