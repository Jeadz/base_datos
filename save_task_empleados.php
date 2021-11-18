<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_empleado'])) {
    //$orden_id = $_POST['orden_id'];
    $empleado_id = $_POST['empleado_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nac = $_POST['fecha_nac'];
    $reporta_a = $_POST['reporta_a'];
    $extension = $_POST['extension'];

    $query = "INSERT INTO empleados(empleado_id, nombre,apellido,fecha_nac,reporta_a,extension) VALUES ('$empleado_id',' $nombre', '$apellido', '$fecha_nac', '$reporta_a', '$extension')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: empleados.php");
}

?>