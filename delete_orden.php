<?php 
    include("db.php");
    $url= $_SERVER["REQUEST_URI"];

//DETALLE ORDENES

    //comprobar si existe el id
    if(isset($_GET['id'])){
        $ordenid = $_GET['id'];
        $query = "DELETE FROM ordenes WHERE ordenid = $ordenid";
        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("No existe ese ID");
        }

        $_SESSION['message'] = 'Registro eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ordenes.php");

    }
    
?>