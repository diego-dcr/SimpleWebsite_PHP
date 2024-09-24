<?php
    class Opinion {
        private $_id;
        private $_comentario;
        private $_nombre;
        private $_userID;
        private $_foto;

        public function __construct($id, $comentario, $nombre, $userID, $foto) {
            $this->setId($id);
            $this->setComentario($comentario);
            $this->setNombre($nombre);
            $this->setUserID($userID);
            $this->setFoto($foto);
        }

        public function getId() {
            return $this->_id;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function getComentario() {
            return $this->_comentario;
        }

        public function setComentario($comentario) {
            $this->_comentario = $comentario;
        }

        public function getNombre() {
            return $this->_nombre;
        }

        public function setNombre($nombre) {
            $this->_nombre = $nombre;
        }

        public function getUserID() {
            return $this->_userID;
        }

        public function setUserID($userID) {
            $this->_userID = $userID;
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
            $arr["comentario"] = $this->getComentario();
            $arr["nombre"] = $this->getNombre();
            $arr["userID"] = $this->getUserID();
            $arr["foto"] = $this->getFoto();

            return $arr;
        }

    }
?>