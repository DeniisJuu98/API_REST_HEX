<?php
class conexion
{
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conex;

    function __construct()
    {
        $listadatos = $this->datosConexion();
        foreach ($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->conex = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        if ($this->conex->connect_errno) {
            echo "Error en la conexion";
            die();
        }
    }

    private function datosConexion()
    {
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }

    private function convertirUTF8($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });
        return $array;
    }


    public function obtenerDatos($sqlstr)
    {
        $results = $this->conex->query($sqlstr);
        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }
        return $this->convertirUTF8($resultArray);

    }
    public function nonQuery($sqlstr){
        $results = $this->conex->query($sqlstr);
        return $this->conex->affected_rows;
    }


    //INSERT
    public function nonQueryId($sqlstr){
        $results = $this->conex->query($sqlstr);
        $filas = $this->conex->affected_rows;
        if($filas >= 1){
            return $this->conex->insert_id;
        }else{
            return 0;
        }
    }

    //encriptar
    protected function encriptar($string){
        return md5($string);
    }




}

?>