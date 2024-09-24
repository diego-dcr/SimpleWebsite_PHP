<?php
    class Usuario {
        private $_id;
        private $_nombre;
        private $_telefono;
        private $_mail;
        private $_password;
        private $_tipo;
        private $_activo;
        private $_foto;

        public function __construct ($id, $nombre, $telefono, $mail, $password, $tipo, $activo, $foto) {
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setTelefono($telefono);
            $this->setMail($mail);
            $this->setPassword($password);
            $this->setTipo($tipo);
            $this->setActivo($activo);
            $this->setFoto($foto);
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

        public function getTelefono() {
            return $this->_telefono;
        }

        public function setTelefono($tel) {
            $this->_telefono = $tel;
        }

        public function getMail() {
            return $this->_mail;
        }

        public function setMail($mail) {
            $this->_mail = $mail;
        }
        
        public function getPassword() {
            return $this->_password;
        }

        public function setPassword($password) {
            $this->_password = $password;
        }

        public function getTipo() {
            return $this->_tipo;
        }

        public function setTipo($tipo) {
            $this->_tipo = $tipo;
        }

        public function getActivo() {
            return $this->_activo;
        }

        public function setActivo($activo) {
            $this->_activo = $activo;
        }

        public function getFoto() {
            return $this->_foto;
        }
    
        public function setFoto($photo) {
            $this->_foto = base64_encode($photo);
        }

        public function getArray() {
            $arr = array();

            $arr["id"] = $this->getId();
            $arr["nombre"] = $this->getNombre();
            $arr["telefono"] = $this->getTelefono();
            $arr["mail"] = $this->getMail();
            $arr["password"] = $this->getPassword();
            $arr["tipo"] = $this->getTipo();
            $arr["activo"] = $this->getActivo();
            $arr["foto"] = $this->getFoto();

            return $arr;
        }
    }
?>