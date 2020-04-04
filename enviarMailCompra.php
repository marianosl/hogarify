<?php

session_start();

$fecha = date("d-m-Y");
$hora = date("H:i:s");
$destino = "hogarify@gmail.com";
$asunto = "Compra de Hogarify";

$desde = "MIME-Version: 1.0\r\n";
$desde.= "Content-Type: text/html; charset=UTF-8\r\n";
$desde.= 'From: compras@hogarify.ml';

$comentario = "<html><head>"
        . "<style type='text/css'>table {
  border: 1px solid black;
  font-family: arial;
  font-size: large;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: center;
  padding: 5px;
  width: 20%;
}

img{
    display:block;
    margin:auto;
    width: 30%;
}</style>"
        . "</head>
            
    <body>
	<br>
	Nombre: $_SESSION[nombre]
        <br>
	Email: $_SESSION[email]
        <br>
	Compra:
        <br>


    <table style=>
        <thead>
            <tr>
                <th>Imágen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody> ";

foreach ($_SESSION[carro] as $key => $value) {

    $comentario.= "
    <tr>                    
                    <td><img src='" . "http://hogarify.ml/" . $value['imagen'] . "'></td>
                    <td><h3>" . $value['descripcion'] . "</h3></td>                    
                    <td>$ " . $value['precio'] . "</td>
                    <td>x " . $value['cantidad'] . "</td>
                    <td>$ " . $value['subtotal'] . "</td>
                </tr>
                ";
}
$total = 0;
foreach ($_SESSION['carro'] as $key => $value) {
    $total = $total + $value['subtotal'];
}

$comentario.= "
    <tr>
    <td>Total</td>
    <td></td>
    <td></td>
    <td></td>
    <td>$ $total</td>
    </tr>
</tbody>
</table>

<br>
Enviado el $fecha a las $hora"
        . "<br>"
        . "</body></html>";
mail($destino, $asunto, $comentario, $desde);

header("Location: compraExitosa.php");





$fecha2 = date("d-m-Y");
$hora2 = date("H:i:s");
$destino2 = $_SESSION['email'];
$asunto2 = "Compra de Hogarify";

$desde2.= "MIME-Version: 1.0\r\n";
$desde2.= "Content-Type: text/html; charset=UTF-8\r\n";
$desde2.= 'From: compras@hogarify.ml';

$comentario2 = "<html><head>"
        . "<style type='text/css'>table {
  border: 1px solid black;
  font-family: arial;
  font-size: large;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: center;
  padding: 5px;
  width: 20%;
}

img{
    display:block;
    margin:auto;
    width: 30%;
}</style>"
        . "</head>
    <body>
<br>
Señor cliente: Su compra se ha realizado con éxito.
<br>
<br>

    <table>
        <thead>
            <tr>
                <th>Imágen</th>
                <th>Producto</th>                
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody> ";

foreach ($_SESSION[carro] as $key => $value) {

    $comentario2.= "
    <tr>                    
                    <td><img src='" . "http://hogarify.ml/" . $value['imagen'] . "'></td>
                    <td><h3>" . $value['descripcion'] . "</h3></td>                    
                    <td>$ " . $value['precio'] . "</td>
                    <td>x " . $value['cantidad'] . "</td>
                    <td>$ " . $value['subtotal'] . "</td>
                </tr>
                ";
}
$total2 = 0;
foreach ($_SESSION['carro'] as $key => $value) {
    $total2 = $total2 + $value['subtotal'];
}

$comentario2.= "
    <tr>
    <td>Total</td>
    <td></td>
    <td></td>
    <td></td>
    <td>$ $total2</td>
    </tr>
</tbody>
</table>

<br>
Gracias.
<br>
<img src='http://hogarify.ml/img/logo.png'>
<br>
Enviado el $fecha2 a las $hora2"
        . "<br>"
        . "</body></html>";
mail($destino2, $asunto2, $comentario2, $desde2);

header("Location: compraExitosa.php");
?>