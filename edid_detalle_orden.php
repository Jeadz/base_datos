<?php
    include("db.php");


//DETALLE ORDENES
    if(isset($_GET['id'])){
        $ordenid = $_GET['id'];
        $query = "SELECT * FROM detallesordenes WHERE ordenid = $ordenid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $detalleid = $row['detalleid'];
            $productoid= $row['productoid'];
            $cantidad = $row['cantidad'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $ordenid = $_GET['id'];
        //Recibo los datos a actualizar
        $detalleid = $_POST['detalleid'];
        $productoid = $_POST['productoid'];
        $cantidad = $_POST['cantidad'];

        //Hacer la consulta 
        $query = "UPDATE detallesordenes set detalleid = '$detalleid', productoid = '$productoid', cantidad = '$cantidad' WHERE ordenid = '$ordenid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: detalle_ordenes.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_detalle_orden.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="number" name="detalleid" value="<?php echo $detalleid; ?>" class= "form-control" placeholder="Actualizar detalle Id"><br/>
                        <input type="number" name="productoid" value="<?php echo $productoid; ?>" class= "form-control" placeholder="Actualizar orden ID"><br/>
                        <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" class= "form-control" placeholder="Actualizar cantidad"><br/>
                    </div>
                    <button class ="btn btn-success" name="actualizar">
                        Actualizar Datos
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Cargo el footer -->
<?php include('includes/footer.php') ?>