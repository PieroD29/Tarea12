<?php
include_once '../Model/Producto.php'; // Asegúrate de que la ruta es correcta

$productos = []; // Array para almacenar los productos

// Abrir el archivo en modo lectura
$file = fopen("productos.txt", "r");

if ($file) {
    // Leer cada línea del archivo
    while (($line = fgets($file)) !== false) {
        // Separar los atributos por comas
        $datos = explode(",", trim($line));

        // Crear una nueva instancia de Producto y establecer los atributos
        if (count($datos) >= 9) { // Asegúrate de que haya suficientes datos
            $producto = new Producto();
            $producto->setNombre($datos[0]);
            $producto->setPrecio(floatval($datos[1]));
            $producto->setCodigo($datos[2]);
            $producto->setDescripcion($datos[3]);
            $producto->setStock(intval($datos[4]));
            $producto->setCategoria($datos[5]);
            $producto->setFechaExpiracion($datos[6]);
            $producto->setMarca($datos[7]);
            $producto->setDescuento(floatval($datos[8]));

            // Agregar el producto al array de productos
            $productos[] = $producto;
        }
    }

    // Cerrar el archivo
    fclose($file);
} else {
    echo '<script>alert("No se pudo abrir el archivo");window.location.href = "listado.php"</script>';
}

// Aquí puedes mostrar los productos o hacer lo que necesites con el array
foreach ($productos as $producto) {
    echo "Nombre: " . $producto->getNombre() . "<br>";
    echo "Precio: S/ " . number_format($producto->getPrecio(), 2) . "<br>";
    echo "Código: " . $producto->getCodigo() . "<br>";
    echo "Descripción: " . $producto->getDescripcion() . "<br>";
    echo "Stock: " . $producto->getStock() . "<br>";
    echo "Categoría: " . $producto->getCategoria() . "<br>";
    echo "Fecha de Expiración: " . $producto->getFechaExpiracion() . "<br>";
    echo "Marca: " . $producto->getMarca() . "<br>";
    echo "Descuento: " . $producto->getDescuento() . "%<br>";
    echo "<hr>";
}
?>
