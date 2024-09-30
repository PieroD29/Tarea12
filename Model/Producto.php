<?php

    class Producto {

        private $nombre;
        private $precio;
        private $codigo;
        private $descripcion;
        private $stock;
        private $categoria;
        private $fechaExpiracion;
        private $marca;
        private $descuento;

        public function __construct(){
        }

        // Getters y Setters para nombre
        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            if (empty($nombre)) {
                echo '<script>alert("Ingrese el nombre del producto");window.location.href = "listado.php"</script>';
            }
            $this->nombre = $nombre;
        }

        // Getters y Setters para precio
        public function getPrecio() {
            return $this->precio;
        }

        public function setPrecio($precio) {
            if ($precio <= 0) {
                echo '<script>alert("El precio del producto es inválido");window.location.href = "listado.php"</script>';
            }
            $this->precio = $precio;
        }

        // Getters y Setters para código
        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo($codigo) {
            if (empty($codigo)) {
                echo '<script>alert("Ingrese el código del producto");window.location.href = "listado.php"</script>';
            }
            $this->codigo = $codigo;
        }

        // Getters y Setters para descripción
        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            if (empty($descripcion)) {
                echo '<script>alert("Ingrese la descripción del producto");window.location.href = "listado.php"</script>';
            }
            $this->descripcion = $descripcion;
        }

        // Getters y Setters para stock
        public function getStock() {
            return $this->stock;
        }

        public function setStock($stock) {
            if ($stock < 0) {
                echo '<script>alert("El stock no puede ser negativo");window.location.href = "listado.php"</script>';
            }
            $this->stock = $stock;
        }

        // Getters y Setters para categoría
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            if (empty($categoria)) {
                echo '<script>alert("Ingrese la categoría del producto");window.location.href = "listado.php"</script>';
            }
            $this->categoria = $categoria;
        }

        // Getters y Setters para fecha de expiración
        public function getFechaExpiracion() {
            return $this->fechaExpiracion;
        }

        public function setFechaExpiracion($fechaExpiracion) {
            if (empty($fechaExpiracion)) {
                echo '<script>alert("Ingrese la fecha de expiración del producto");window.location.href = "listado.php"</script>';
            }
            $this->fechaExpiracion = $fechaExpiracion;
        }

        // Getters y Setters para marca
        public function getMarca() {
            return $this->marca;
        }

        public function setMarca($marca) {
            if (empty($marca)) {
                echo '<script>alert("Ingrese la marca del producto");window.location.href = "listado.php"</script>';
            }
            $this->marca = $marca;
        }

        // Getters y Setters para descuento
        public function getDescuento() {
            return $this->descuento;
        }

        public function setDescuento($descuento) {
            if ($descuento < 0 || $descuento > 100) {
                echo '<script>alert("El descuento debe estar entre 0 y 100");window.location.href = "listado.php"</script>';
            }
            $this->descuento = $descuento;
        }

    }

?>
