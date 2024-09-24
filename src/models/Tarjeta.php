<?php
    class Tarjeta {
        private $_id;
        private $_nombre;
        private $_Notarjeta;
        private $_cvv;
        private $_pais;
        private $_fecha;
        private $_activo;
        private $_userID;

        public function __construct($id, $nombre, $Notarjeta, $fecha, $cvv, $pais, $activo, $userID) {
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setNotarjeta($Notarjeta);
            $this->setCvv($cvv);
            $this->setPais($pais);
            $this->setFecha($fecha);
            $this->setActivo($activo);
            $this->setUserID($userID);
        }

        public function getId() {
            return $this->_id;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function getNombre() {
            return $this->_nombre;
        }

        public function setNombre($nombre) {
            $this->_nombre = $nombre;
        }

        public function getNotarjeta() {
            return $this->_Notarjeta;
        }

        public function setNotarjeta($Notarjeta) {
            $this->_Notarjeta = $Notarjeta;
        }

        public function getCvv() {
            return $this->_cvv;
        }

        public function setCvv($cvv) {
            $this->_cvv = $cvv;
        }

        public function getPais() {
            return $this->_pais;
        }

        public function setPais($pais) {
            $this->_pais = $pais;
        }

        public function getFecha() {
            return $this->_fecha;
        }

        public function setFecha($fecha) {
            $this->_fecha = $fecha;
        }

        public function getActivo() {
            return $this->_activo;
        }

        public function setActivo($activo) {
            $this->_activo = $activo;
        }

        public function getUserID() {
            return $this->_userID;
        }

        public function setUserID($userID) {
            $this->_userID = $userID;
        }

        public function getArray() {
            $arr = array();
            
            $arr['id'] = $this->getId();
            $arr['nombre'] = $this->getNombre();
            $arr['Notarjeta'] = $this->getNotarjeta();
            $arr['fecha'] = $this->getFecha();
            $arr['cvv'] = $this->getCvv();
            $arr['pais'] = $this->getPais();
            $arr['activo'] = $this->getActivo();
            $arr['userID'] = $this->getUserID();

            return $arr;
        }
    }
?>