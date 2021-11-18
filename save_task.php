<?php

include("db.php");

//DETALLE ORDENES
    //ACA SE CREA EL METODO POST PARA GUARDAR LOS DATOS OBTENIDOS
    if (isset($_POST['save_task'])) {
        //$orden_id = $_POST['orden_id'];
        $detalle_id = $_POST['detalle_id'];
        $producto_id = $_POST['producto_id'];
        $cantidad_id = $_POST['cantidad_id'];
        
        $query = "INSERT INTO detallesordenes(detalleid,productoid,cantidad) VALUES ('$detalle_id',' $producto_id', '$cantidad_id')";
        $result = mysqli_query($conexion, $query);

        if(!$result){
            die("Error al guardar datos");
        }

        //Almacenar el mensaje 
        $_SESSION['message'] = 'Datos guardados correctamente';
        $_SESSION['message_type'] ='success';

        //Redirecciono al momento de guardar a la misma locacion
        
        header("Location: detalle_ordenes.php");
    }
?>