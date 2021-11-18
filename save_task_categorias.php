<?php
include("db.php");

//ORDNEES 
if (isset($_POST['save_task_categorias'])) {
    //$orden_id = $_POST['orden_id'];
    $categoriaid = $_POST['categoriaid'];
    $nombrecat = $_POST['nombrecat'];

    $query = "INSERT INTO categorias(categoriaid, nombrecat) VALUES ('$categoriaid',' $nombrecat')";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("Error al guardar datos");
    }

    //Almacenar el mensaje 
    $_SESSION['message'] = 'Datos guardados correctamente';
    $_SESSION['message_type'] ='success';

    //Redirecciono al momento de guardar a la misma locacion
    
    header("Location: categorias.php");
}

?>