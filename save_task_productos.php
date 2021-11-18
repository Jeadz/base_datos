<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_productos'])) {
    //$orden_id = $_POST['orden_id'];
    $productoid = $_POST['productoid'];
    $descripcion = $_POST['descripcion'];
    $preciounit = $_POST['preciounit'];
    $existencia = $_POST['existencia'];
    $proveedorid = $_POST['proveedorid'];
    $categoriaid = $_POST['categoriaid'];

    $query = "INSERT INTO productos(descripcion,preciounit,existencia,proveedorid,categoriaid) 
    VALUES (' $descripcion', '$preciounit', '$existencia', '$proveedorid', '$categoriaid')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: productos.php");
}

?>