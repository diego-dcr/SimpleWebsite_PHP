<?php
    class Pedido {
        private $_id;
        private $_userID;
        private $_direction;
        private $_nota;
        private $_costo;
        private $_tarjeta;
        private $_fecha;
        private $_activo;

        public function __construct($id, $direction, $nota, $costo, $tarjeta, $fecha, $userID, $activo) {
            $this->setId($id);
            $this->setDirection($direction);
            $this->setNota($nota);
            $this->setCosto($costo);
            $this->setTarjeta($tarjeta);
            $this->setFecha($fecha);
            $this->setUserID($userID);
            $this->setActivo($activo);
        }

        public function getId() {
            return $this->_id;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function getUserID() {
            return $this->_userID;
        }

        public function setUserID($userID) {
            $this->_userID = $userID;
        } 
        
        public function getDirection() {
            return $this->_direction;
        }

        public function setDirection($direction) {
            $this->_direction = $direction;
        }

        public function getNota() {
            return $this->_nota;
        }

        public function setNota($nota) {
            $this->_nota = $nota;
        }

        public function getCosto() {
            return $this->_costo;
        }

        public function setCosto($costo) {
            $this->_costo = $costo;
        }

        public function getTarjeta() {
            return $this->_tarjeta;
        }
        
        public function setTarjeta($tarjeta) {
            $this->_tarjeta = $tarjeta;
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
        
        public function getArray() {
            $arr = array();

            $arr["id"] = $this->getId();
            $arr["direccion"] = $this->getDirection();
            $arr["costo"] = $this->getCosto();
            $arr["tarjeta"] = $this->getTarjeta();
            $arr["fecha"] = $this->getFecha();
            $arr["userID"] = $this->getUserID();
            $arr["activo"] = $this->getActivo();

            return $arr;
        }
    }
?>