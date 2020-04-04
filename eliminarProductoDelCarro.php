<?php

session_start();

unset($_SESSION['carro'][$_POST['hfIdProducto']]);

if (count($_SESSION['carro']) == 0) {
    unset($_SESSION['carro']);
}

header('Location: ' . $_POST['paginaADireccionar']);
?>