<?php

session_start();

$email = $_SESSION['email'];
$total = 0;
foreach ($_SESSION['carro'] as $key => $value) {
    $total = $total + $value['subtotal'];
}
$nroTarjeta = $_POST['txtNroTarjeta'];
$codSeguridad = $_POST['txtCodSeguridad'];

include("conexion.php");
include("redirigirPaginaError.php");

$sql = "insert into compras (fecha_hora, total, email, nro_tarjeta, cod_seguridad) values (current_timestamp(), '$total', '$email', '$nroTarjeta', '$codSeguridad');";

mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

$nroCompra = mysql_insert_id($link);
$sql = "insert into productos_cantidad_compra (cantidad, id_producto, nro_compra) values";
foreach ($_SESSION['carro'] as $key => $value) {
    $cantidad = $value['cantidad'];
    $sql = $sql . " ('$cantidad', '$key', '$nroCompra'),";
}
mysql_query(rtrim($sql, ','), $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

mysql_close($link);

$_SESSION['nroCompra'] = $nroCompra;

header('Location: compraExitosa.php');

include './enviarMailCompra.php';
?>