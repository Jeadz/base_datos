<?php
    include("db.php");


//EMPLEADOS 
    if(isset($_GET['id'])){
        $empleado_id = $_GET['id'];
        $query = "SELECT * FROM empleados WHERE empleado_id = $empleado_id";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $nombre = $row['nombre'];
            $apellido= $row['apellido'];
            $fecha_nac = $row['fecha_nac'];
            $reporta_a = $row['reporta_a'];
            $extension = $row['extension'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $empleado_id = $_GET['id'];
        //Recibo los datos a actualizar
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nac = $_POST['fecha_nac'];
        $reporta_a = $_POST['reporta_a'];
        $extension = $_POST['extension'];

        //Hacer la consulta 
        $query = "UPDATE empleados set nombre = '$nombre', apellido = '$apellido', fecha_nac = '$fecha_nac', reporta_a ='$reporta_a', extension ='$extension' WHERE empleado_id = '$empleado_id'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: empleados.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_empleados.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class= "form-control"  placeholder="Actualizar nombre"><br/>
                        <input type="text" name="apellido" value="<?php echo $apellido; ?>" class= "form-control" placeholder="Actualizar apellido"><br/>
                        <input type="date" name="fecha_nac" value="<?php echo $fecha_nac; ?>" class= "form-control" placeholder="Actualizar fecha nacimiento"><br/>
                        <input type="number" name="reporta_a" value="<?php echo $reporta_a; ?>" class= "form-control" placeholder="Reporta a:"><br/>
                        <input type="number" name="extension" value="<?php echo $extension; ?>" class= "form-control" placeholder="Extensión"><br/>

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