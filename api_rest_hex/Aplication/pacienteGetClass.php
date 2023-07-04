<?php
include_once 'Interfaces/pacienteGetInt.php';
class pacienteGetClass extends conexion implements pacienteGetInt {
    public function getPaciente($id)
    {
        $query = "SELECT * FROM pacientes WHERE PacienteId = '$id'";
        return parent::obtenerDatos($query);
    }
    public function listaPacientes($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT PacienteId,Nombre,DNI,Telefono,Correo FROM pacientes limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

}