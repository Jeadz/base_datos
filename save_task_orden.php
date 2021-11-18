<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_orden'])) {
    $orden_id = $_POST['orden_id'];
    $empleado_id = $_POST['empleado_id'];
    $clienteid = $_POST['clienteid'];
    $fechaorden = $_POST['fechaorden'];
    $descuento = $_POST['descuento'];
    
    $query = "INSERT INTO ordenes(ordenid, empleado_id,clienteid,fechaorden,descuento) VALUES ('$orden_id','$empleado_id',' $clienteid', '$fechaorden', '$descuento')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: ordenes.php");
}

?>