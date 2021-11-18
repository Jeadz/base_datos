<?php
    include("db.php");


//EMPLEADOS 
    if(isset($_GET['id'])){
        $productoid = $_GET['id'];
        $query = "SELECT * FROM productos WHERE productoid = $productoid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $descripcion = $row['descripcion'];
            $preciounit= $row['preciounit'];
            $existencia = $row['existencia'];
            $proveedorid = $row['proveedorid'];
            $categoriaid = $row['categoriaid'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $productoid = $_GET['id'];
        //Recibo los datos a actualizar
        $descripcion = $_POST['descripcion'];
        $preciounit = $_POST['preciounit'];
        $existencia = $_POST['existencia'];
        $proveedorid = $_POST['proveedorid'];
        $categoriaid = $_POST['categoriaid'];

        //Hacer la consulta 
        $query = "UPDATE productos set descripcion = '$descripcion', preciounit = '$preciounit', existencia = '$existencia', proveedorid ='$proveedorid', categoriaid ='$categoriaid' WHERE productoid = '$productoid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: productos.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_productos.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class= "form-control" placeholder="Actualizar descripcion"><br/>
                        <input type="number" name="preciounit" value="<?php echo $totalAmt; ?>" class= "form-control" placeholder="Actualizar precio unitario"><br/>
                        <input type="number" name="existencia" value="<?php echo $existencia; ?>" class= "form-control" placeholder="Actualizar existencia"><br/>
                        <input type="number" name="proveedorid" value="<?php echo $proveedorid; ?>" class= "form-control" placeholder="Actualizar proveedor ID"><br/>
                        <input type="number" name="categoriaid" value="<?php echo $categoriaid; ?>" class= "form-control" placeholder="Actualizar categoría"><br/>

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