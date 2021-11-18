<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_proveedores'])) {
    //$orden_id = $_POST['orden_id'];
    $proveedorid = $_POST['proveedorid'];
    $nombreprov = $_POST['nombreprov'];
    $contactoprov = $_POST['contactoprov'];
    $cedulaprov = $_POST['cedulaprov'];
    $fijoprov = $_POST['fijoprov'];

    $query = "INSERT INTO proveedores(nombreprov,contactoprov,cedulaprov,fijoprov) 
    VALUES (' $nombreprov', '$contactoprov', '$cedulaprov', '$fijoprov')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: proveedores.php");
}

?>