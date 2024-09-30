<?php
    include_once '../Model/Producto.php';

    $file = fopen("productos.txt","a");

    $nombre = $_POST["pNombre"];
    $precio = $_POST["pPrecio"];
    $codigo = $_POST["pCodigo"];
    $descripcion = $_POST["pDescripcion"];
    $stock = $_POST["pStock"];
    $categoria = $_POST["pCategoria"];
    $fechaExpiracion = $_POST["pFechaExpiracion"];
    $marca = $_POST["pMarca"];
    $descuento = $_POST["pDescuento"];

    $control = isset($nombre) && isset($precio) && isset($codigo) && isset($descripcion) && isset($stock) && isset($categoria) && isset($fechaExpiracion) && isset($marca) && isset($descuento);

    $producto = new Producto();

    $producto->setNombre($nombre);
    $producto->setPrecio($precio);
    $producto->setCodigo($codigo);
    $producto->setDescripcion($descripcion);
    $producto->setStock($stock);
    $producto->setCategoria($categoria);
    $producto->setFechaExpiracion($fechaExpiracion);
    $producto->setMarca($marca);
    $producto->setDescuento($descuento);

    if ( $control ){

        if ($file) {
            // Escribir los productos en el archivo
            $line = $producto->getNombre() . "," . $producto->getPrecio() . "," . $producto->getCodigo() . ","
                 . $producto->getDescripcion() . "," . $producto->getStock() ."," . $producto->getCategoria() . ","
                 . $producto->getFechaExpiracion() . "," . $producto->getMarca() . "," . $producto->getDescuento() . "\n";
            fwrite($file, $line);
            
            // Cerrar el archivo
            fclose($file);
            
        }

    } else{

    }

?>