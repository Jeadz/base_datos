<?php
//inicia sesión que permita guardar un dato
session_start();

//CREACION CADENA DE CONEXION
$conexion = mysqli_connect(
        "localhost",
        "root",
        "",
        "pedidos"
);

?>