<?php
    include("db.php");


//EMPLEADOS 
    if(isset($_GET['id'])){
        $clienteid = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE clienteid = $clienteid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $cedula_ruc = $row['cedula_ruc'];
            $nombrecia= $row['nombrecia'];
            $nombrecontacto = $row['nombrecontacto'];
            $direccioncli = $row['direccioncli'];
            $fax = $row['fax'];
            $email = $row['email'];
            $celular = $row['celular'];
            $fijo = $row['fijo'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $clienteid = $_GET['id'];
        //Recibo los datos a actualizar
        $cedula_ruc = $_POST['cedula_ruc'];
        $nombrecia = $_POST['nombrecia'];
        $nombrecontacto = $_POST['nombrecontacto'];
        $direccioncli = $_POST['direccioncli'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $fijo = $_POST['fijo'];

        //Hacer la consulta 
        $query = "UPDATE clientes set cedula_ruc = '$cedula_ruc', nombrecia = '$nombrecia', nombrecontacto = '$nombrecontacto', direccioncli ='$direccioncli', fax ='$fax', email='$email', celular='$celular', fijo='$fijo' WHERE clienteid = '$clienteid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: clientes.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_clientes.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="number" name="cedula_ruc" value="<?php echo $cedula_ruc; ?>" class= "form-control" placeholder="Actualizar cedula_ruc"><br/>
                        <input type="text" name="nombrecia" value="<?php echo $nombrecia; ?>" class= "form-control" placeholder="Actualizar nombrecia"><br/>
                        <input type="text" name="nombrecontacto" value="<?php echo $nombrecontacto; ?>" class= "form-control" placeholder="Actualizar nombre contácto"><br/>
                        <input type="text" name="direccioncli" value="<?php echo $direccioncli; ?>" class= "form-control" placeholder="Actualizar dirección"><br/>
                        <input type="text" name="fax" value="<?php echo $fax; ?>" class= "form-control" placeholder="Actualizar Fax"><br/>
                        <input type="text" name="email" value="<?php echo $email; ?>" class= "form-control" placeholder="Actualizar E-mail"><br/>
                        <input type="text" name="celular" value="<?php echo $celular; ?>" class= "form-control" placeholder="Actualizar celular"><br/>
                        <input type="text" name="fijo" value="<?php echo $fijo; ?>" class= "form-control" placeholder="Actualizar fijo"><br/>

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