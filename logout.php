<?php

session_start();
if (isset($_SESSION['carro'])) {
    unset($_SESSION['email']);
    unset($_SESSION['nombre']);
    unset($_SESSION['rol']);
} else {
    session_destroy();
}
header('Location: index.php');
?>