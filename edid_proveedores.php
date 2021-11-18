<?php
    include("db.php");


//EMPLEADOS 
    if(isset($_GET['id'])){
        $proveedorid = $_GET['id'];
        $query = "SELECT * FROM proveedores WHERE proveedorid = $proveedorid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $nombreprov = $row['nombreprov'];
            $contactoprov= $row['contactoprov'];
            $cedulaprov = $row['cedulaprov'];
            $fijoprov = $row['fijoprov'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $proveedorid = $_GET['id'];
        //Recibo los datos a actualizar
        $nombreprov = $_POST['nombreprov'];
        $contactoprov = $_POST['contactoprov'];
        $cedulaprov = $_POST['cedulaprov'];
        $fijoprov = $_POST['fijoprov'];

        //Hacer la consulta 
        $query = "UPDATE proveedores set nombreprov = '$nombreprov', contactoprov = '$contactoprov', cedulaprov = '$cedulaprov', fijoprov ='$fijoprov' WHERE proveedorid = '$proveedorid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: proveedores.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_proveedores.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="nombreprov" value="<?php echo $nombreprov; ?>" class= "form-control" placeholder="Actualizar nombre proveedor"><br/>
                        <input type="text" name="contactoprov" value="<?php echo $contactoprov; ?>" class= "form-control" placeholder="Actualizar contácto proveedor"><br/>
                        <input type="text" name="cedulaprov" value="<?php echo $cedulaprov; ?>" class= "form-control" placeholder="Actualizar cédula"><br/>
                        <input type="text" name="fijoprov" value="<?php echo $fijoprov; ?>" class= "form-control" placeholder="Actualizar fijo proveedor"><br/>
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