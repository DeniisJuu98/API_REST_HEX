<?php
require_once "Domain/service/conexion.php";

    class paciente extends conexion
    {
        private $table = "pacientes";
        private $pacienteid = "";
        private $dni = "";
        private $nombre = "";
        private $direccion = "";
        private $codigoPostal = "";
        private $genero = "";
        private $telefono = "";
        private $fechaNacimiento = "0000-00-00";
        private $correo = "";
        private $token = "";

//307651421f7725ebcd75eea7d79d1342


        /**
         * @return string
         */
        public function getTable()
        {
            return $this->table;
        }

        /**
         * @param string $table
         */
        public function setTable($table)
        {
            $this->table = $table;
        }

        /**
         * @return string
         */
        public function getPacienteid()
        {
            return $this->pacienteid;
        }

        /**
         * @param string $pacienteid
         */
        public function setPacienteid($pacienteid)
        {
            $this->pacienteid = $pacienteid;
        }

        /**
         * @return string
         */
        public function getDni()
        {
            return $this->dni;
        }

        /**
         * @param string $dni
         */
        public function setDni($dni)
        {
            $this->dni = $dni;
        }

        /**
         * @return string
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param string $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * @return string
         */
        public function getDireccion()
        {
            return $this->direccion;
        }

        /**
         * @param string $direccion
         */
        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        /**
         * @return string
         */
        public function getCodigoPostal()
        {
            return $this->codigoPostal;
        }

        /**
         * @param string $codigoPostal
         */
        public function setCodigoPostal($codigoPostal)
        {
            $this->codigoPostal = $codigoPostal;
        }

        /**
         * @return string
         */
        public function getGenero()
        {
            return $this->genero;
        }

        /**
         * @param string $genero
         */
        public function setGenero($genero)
        {
            $this->genero = $genero;
        }

        /**
         * @return string
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param string $telefono
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        /**
         * @return string
         */
        public function getFechaNacimiento()
        {
            return $this->fechaNacimiento;
        }

        /**
         * @param string $fechaNacimiento
         */
        public function setFechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
        }

        /**
         * @return string
         */
        public function getCorreo()
        {
            return $this->correo;
        }

        /**
         * @param string $correo
         */
        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        /**
         * @return string
         */
        public function getToken()
        {
            return $this->token;
        }

        /**
         * @param string $token
         */
        public function setToken($token)
        {
            $this->token = $token;
        }
    }
?>