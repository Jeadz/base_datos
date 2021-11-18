<?php include("db.php")?>
<?php include("includes/header.php")?>

<!--CREACION DEL FORMULARIO-->
<div class="container p-4">
    <div class ="row">
<!-- SE VALIDA PARA PINTAR EL MENSAJE DE ALERTA-->  
    <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php session_unset();} ?>
    <div class="col md-4">
        <div class="card card-body">
            <form action="save_task_categorias.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                    <!--<input type="number" name="categoriaid" class="form-control"
                    placeholder="Categoría ID" autofocus><br>   -->          
                    <input type="text" name="nombrecat" class="form-control"
                    placeholder="Nombre Categoría" autofocus><br>                    
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_categorias" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Categoría Id</th>
            <th>Nombre Categoría</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM categorias";
            $resultado_productos = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_productos)){?>
            <tr>
                <td><?php echo $row['categoriaid']?></td>
                <td><?php echo $row['nombrecat']?></td>
                <td>
                <a href="edid_categorias.php?id=<?php echo $row['categoriaid']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_categorias.php?id=<?php echo $row['categoriaid']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
            </tr>
            <?php }?>
            
        </tbody>
        </table>
    </div>
    </div>
</div>

<?php include("includes/footer.php")?>