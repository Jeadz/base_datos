<?php 
    include("db.php");
    $url= $_SERVER["REQUEST_URI"];

//DETALLE ORDENES

    //comprobar si existe el id
    if(isset($_GET['id'])){
        $proveedorid = $_GET['id'];
        $query = "DELETE FROM proveedores  WHERE proveedorid = $proveedorid";
        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("No existe ese ID");
        }

        $_SESSION['message'] = 'Registro eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: proveedores.php");
        
    }
    
?>