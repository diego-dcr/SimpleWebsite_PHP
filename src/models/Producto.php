<?php
    class Producto {
        private $_id;
        private $_nombre;
        private $_categoria;
        private $_descripcion;
        private $_precio;
        private $_activo;
        private $_foto;


        public function __construct($id, $nombre, $categoria, $descripcion, $precio, $activo, $foto) {
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setCategoria($categoria);
            $this->setDescripcion($descripcion);
            $this->setPrecio($precio);
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

        public function getCategoria() {
            return $this->_categoria;
        }

        public function setCategoria($categoria) {
            $this->_categoria = $categoria;
        }
        
        public function getDescripcion() {
            return $this->_descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->_descripcion = $descripcion;
        }

        public function getPrecio() {
            return $this->_precio;
        }

        public function setPrecio($precio) {
            $this->_precio = $precio;
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
            $arr["categoria"] = $this->getCategoria();
            $arr["descripcion"] = $this->getDescripcion();
            $arr["precio"] = $this->getPrecio();
            $arr["activo"] = $this->getActivo();
            $arr["foto"] = $this->getFoto();

            return $arr;
        }
    }
?>