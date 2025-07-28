<?php
session_start();

// Elimina solo el carrito
unset($_SESSION['carrito_donaciones']);

header("Location: ver_carrito.php"); // Redirige al carrito

?>