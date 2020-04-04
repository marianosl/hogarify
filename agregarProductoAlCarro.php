<?php

session_start();

if (!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = array();
}

$_SESSION['carro'][$_POST['hfIdProducto']] = array('descripcion' => $_POST['hfDescProducto'],
    'categoria' => $_POST['hfDescCategoria'], 'imagen' => $_POST['hfImagen'], 'precio' => $_POST['hfPrecio'],
    'cantidad' => $_POST['txtCantidad'], 'subtotal' => $_POST['hfPrecio'] * $_POST['txtCantidad']);

header('Location: productos.php');
?>