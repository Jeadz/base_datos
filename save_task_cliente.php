<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_cliente'])) {
    //$orden_id = $_POST['orden_id'];
    $cliente_id = $_POST['clienteid'];
    $cedula_ruc = $_POST['cedula_ruc'];
    $nombrecia = $_POST['nombrecia'];
    $nombrecontacto = $_POST['nombrecontacto'];
    $direccioncli = $_POST['direccioncli'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $fijo = $_POST['fijo'];


    $query = "INSERT INTO clientes(clienteid,cedula_ruc,nombrecia,nombrecontacto,direccioncli,fax,email,celular,fijo) 
    VALUES ('$cliente_id','$cedula_ruc', '$nombrecia', '$nombrecontacto', '$direccioncli', '$fax', '$email','$celular','$fijo')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: clientes.php");
}

?>