<?php 
    include("db.php");
    $url= $_SERVER["REQUEST_URI"];

//DETALLE ORDENES

    //comprobar si existe el id
    if(isset($_GET['id'])){
        $cliente_id = $_GET['id'];
        $query = "DELETE FROM clientes WHERE clienteid = $cliente_id";
        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("No existe ese ID");
        }

        $_SESSION['message'] = 'Registro eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: clientes.php");

    }
    
?>