<?php
    class Descripcion {
        private $_id;
        private $_pedidoID;
        private $_producto;
        private $_cantidad;

        public function __construct($id, $pedidoID, $producto, $cantidad) {
            $this->setId($id);
            $this->setPedidoID($pedidoID);
            $this->setProducto($producto);
            $this->setCantidad($cantidad);
        }

        public function getId() {
            return $this->_id;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function getPedidoID() {
            return $this->_pedidoID;
        }

        public function setPedidoID($pedidoID) {
            $this->_pedidoID = $pedidoID;
        }

        public function getProducto() {
            return $this->_producto;
        }

        public function setProducto($producto) {
            $this->_producto = $producto;
        }

        public function getCantidad() {
            return $this->_cantidad;
        }

        public function setCantidad($cantidad) {
            $this->_cantidad = $cantidad;
        }

        public function getArray() {
            $arr = array();

            $arr["id"] = $this->getId();
            $arr["pedidoID"] = $this->getPedidoID();
            $arr["producto"] = $this->getProducto();
            $arr["cantidad"] = $this->getCantidad();

            return $arr;
        }
    }
?>