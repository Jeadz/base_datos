<?php
    include("db.php");


// ORDENES
    if(isset($_GET['id'])){
        $ordenid = $_GET['id'];
        $query = "SELECT * FROM ordenes WHERE ordenid = $ordenid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $empleado_id = $row['empleado_id'];
            $clienteid= $row['clienteid'];
            $fechaorden = $row['fechaorden'];
            $descuento = $row['descuento'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $ordenid = $_GET['id'];
        //Recibo los datos a actualizar
        $empleado_id = $_POST['empleado_id'];
        $clienteid = $_POST['clienteid'];
        $fechaorden = $_POST['fechaorden'];
        $descuento = $_POST['descuento'];

        //Hacer la consulta 
        $query = "UPDATE ordenes set empleado_id = '$empleado_id', clienteid = '$clienteid', fechaorden = '$fechaorden', descuento = '$descuento' WHERE ordenid = '$ordenid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: ordenes.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_ordenes.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="empleado_id" value="<?php echo $empleado_id; ?>" class= "form-control" placeholder="Actualizar empleado Id"><br/>
                        <input type="number" name="clienteid" value="<?php echo $clienteid; ?>" class= "form-control" placeholder="Actualizar cliente ID"><br/>
                        <input type="date" name="fechaorden" value="<?php echo $fechaorden; ?>" class= "form-control" placeholder="Actualizar fecha"><br/>
                        <input type="number" name="descuento" value="<?php echo $descuento; ?>" class= "form-control" placeholder="Actualizar descuento"><br/>

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