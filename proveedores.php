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
            <form action="save_task_proveedores.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                    <input type="number" name="proveedorid" class="form-control"
                    placeholder="Proveedor ID" autofocus><br>             
                    <input type="text" name="nombreprov" class="form-control"
                    placeholder="Nombre Proveedor" autofocus><br>
                    <input type="text" name="contactoprov" class="form-control"
                    placeholder="Contácto Proveedor" autofocus><br>
                    <input type="text" name="cedulaprov" class="form-control"
                    placeholder="Cédula Proveedor" autofocus><br>
                    <input type="text" name="fijoprov" class="form-control"
                    placeholder="Fijo Proveedor" autofocus><br>
                    
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_proveedores" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Proveedor Id</th>
            <th>Nombre Proveedor</th>
            <th>Contácto Proveedor</th>
            <th>Cédula Proveedor</th>
            <th>Fijo Proveedor</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM proveedores";
            $resultado_productos = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_productos)){?>
            <tr>
                <td><?php echo $row['proveedorid']?></td>
                <td><?php echo $row['nombreprov']?></td>
                <td><?php echo $row['contactoprov']?></td>
                <td><?php echo $row['cedulaprov']?></td>
                <td><?php echo $row['fijoprov']?></td>
                <td>
                <a href="edid_proveedores.php?id=<?php echo $row['proveedorid']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_proveedores.php?id=<?php echo $row['proveedorid']?>" class="btn btn-danger">
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