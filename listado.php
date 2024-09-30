<?php

include_once 'Model/Cliente.php';
include_once 'Model/Producto.php';
include_once 'Model/Factura.php';

session_start();

$cliente = null;
$productos = [];

$control1 = isset($_POST["cNombre"]) && isset($_POST["cEmail"]);
$control2 = isset($_POST["pNombre"]) && isset($_POST["pPrecio"]) && isset($_POST["pCodigo"]) && isset($_POST["pDescripcion"]) && isset($_POST["pStock"]) && isset($_POST["pCategoria"]) && isset($_POST["pFechaExpiracion"]) && isset($_POST["pMarca"]) && isset($_POST["pDescuento"]);
$control3 = isset($_SESSION["productos"]);

if ($control1) {
    $clienteNombre = $_POST["cNombre"];
    $clienteEmail = $_POST["cEmail"];
    
    $_SESSION["cliente"] = new Cliente($clienteNombre, $clienteEmail);
    $_SESSION['productos'] = [];
}

if (isset($_SESSION["cliente"])) {
    $cliente = $_SESSION["cliente"];
}

if ($control2) {
    $nombreProducto = $_POST["pNombre"];
    $precioProducto = $_POST["pPrecio"];
    $codigoProducto = $_POST["pCodigo"];
    $descripcionProducto = $_POST["pDescripcion"];
    $stockProducto = $_POST["pStock"];
    $categoriaProducto = $_POST["pCategoria"];
    $fechaExpiracionProducto = $_POST["pFechaExpiracion"];
    $marcaProducto = $_POST["pMarca"];
    $descuentoProducto = $_POST["pDescuento"];

    if (!($control3)) {
        $_SESSION["productos"] = [];
    }

    if ($precioProducto >= 1) {
        $producto->setNombre($nombreProducto);
        $producto->setPrecio($precioProducto);
        $producto->setCodigo($codigoProducto);
        $producto->setDescripcion($descripcionProducto);
        $producto->setStock($stockProducto);
        $producto->setCategoria($categoriaProducto);
        $producto->setFechaExpiracion($fechaExpiracionProducto);
        $producto->setMarca($marcaProducto);
        $producto->setDescuento($descuentoProducto);

        $_SESSION["productos"][] = $producto;
    }
}

$productos = isset($_SESSION["productos"]) ? $_SESSION["productos"] : [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/listado.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Producto y Cliente</title>
</head>
<body>

<div class="container">
    <!-- Columna izquierda: Formulario -->
    <div class="form-column">
        <h1>Agregar Producto</h1>


        <form action="" method="POST" id="form-productos">
            <label for="pNombre">Nombre del Producto:</label> 
            <input type="text" id="pNombre" name="pNombre">

            <label for="pPrecio">Precio del Producto (S/):</label>
            <input type="number" id="pPrecio" name="pPrecio" step="0.01">

            <label for="pCodigo">Código:</label>
            <input type="number" id="pCodigo" name="pCodigo">

            <label for="pDescripcion">Descripción:</label>
            <input type="text" id="pDescripcion" name="pDescripcion">

            <label for="pStock">Stock:</label>
            <input type="number" id="pStock" name="pStock">

            <label for="pCategoria">Categoría:</label>
            <input type="text" id="pCategoria" name="pCategoria">

            <label for="pFechaExpiracion">Fecha de Expiración:</label>
            <input type="date" id="pFechaExpiracion" name="pFechaExpiracion">

            <label for="pMarca">Marca:</label>
            <input type="text" id="pMarca" name="pMarca">

            <label for="pDescuento">Descuento (%):</label>
            <input type="number" id="pDescuento" name="pDescuento" step="1" min="0" max="100">

            <input type="submit" value="Guardar Producto">
        </form>


        <div>
            <form action="index.php" method="get">
                <input type="submit" value="Regresar" style="margin-top: 20px; background-color: darkred;">
            </form>
        </div>
    <?php   if ($control2){?>
        <div>
            <form action="generarFactura.php" method="get">
                <input type="submit" value="Generar Factura" style="margin-top: 20px; background-color: green;">
            </form>
        </div>
    <?php   }?>
    </div>

    <!-- Columna derecha: Listado de productos y datos del cliente -->
    <div class="list-column">
        <h1>Listado de Productos</h1>
        <div class="customer-info">
            <strong>Datos del Cliente</strong>
            <p>Nombre: <?php if ($cliente) echo $cliente->getNombre(); ?></p>
            <p>Correo: <?php if ($cliente) echo $cliente->getEmail(); ?></p>
        </div>

        <ul class="product-list">

        <?php   if (empty($productos)){ ?>
                <li>No hay productos agregados.</li>
        <?php   } else {
                    foreach ($productos as $producto){ ?>
                        <li>
                            <strong><?php echo $producto->getNombre(); ?>:</strong>
                            Precio: S/ <?php echo number_format($producto->getPrecio(), 2); ?>
                        </li>  
        <?php       }
                } ?>

        </ul>

    </div>
</div>

<script src="JS/guardar.js"></script>
<script src="JS/leer.js"></script>

</body>
</html>
