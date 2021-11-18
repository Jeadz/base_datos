<?php
    include("db.php");


//DETALLE ORDENES
    if(isset($_GET['id'])){
        $categoriaid = $_GET['id'];
        $query = "SELECT * FROM categorias WHERE categoriaid = $categoriaid";
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_Array($resultado);
            $nombrecat = $row['nombrecat'];
        }
    }

//VALIDACION PARA GUARDAR LOS DATOS POR EL METODO POST
    if(isset($_POST['actualizar'])){
        //tomar los datos para actualizar
        $categoriaid = $_GET['id'];
        //Recibo los datos a actualizar
        $nombrecat = $_POST['nombrecat'];

        //Hacer la consulta 
        $query = "UPDATE categorias set  nombrecat = '$nombrecat' WHERE categoriaid = '$categoriaid'";
        mysqli_query($conexion,$query);

        //Mensaje satisfaccion
        $_SESSION['message'] = "DATOS ACTUALIZADOS CORRECTAMENTE";
        $_SESSION['message_type'] = "success";
        //Redirecciono a la vista principal
        header("Location: categorias.php");
        
    }

?>

<!-- cargo el formulario del header-->
<?php include("includes/header.php")?>
<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edid_categorias.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="nombrecat" value="<?php echo $nombrecat; ?>" class= "form-control" placeholder="Actualizar nombre categoría"><br/>
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