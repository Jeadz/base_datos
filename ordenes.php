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
            <form action="save_task_orden.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                    <input type="number" name="empleado_id" class="form-control"
                    placeholder="Empleado ID" autofocus><br>             
                    <input type="number" name="clienteid" class="form-control"
                    placeholder="Cliente ID" autofocus><br>
                    <input type="date" name="fechaorden" class="form-control"
                    placeholder="Fecha Orden" autofocus><br>
                    <input type="number" name="descuento" class="form-control"
                    placeholder="Descuento" autofocus><br>
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_orden" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Orden ID</th>
            <th>Empleado ID</th>
            <th>Cliente ID</th>
            <th>Fecha Orden</th>
            <th>Descuento</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM ordenes";
            $resultado_ordenes = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_ordenes)){?>
            <tr>
                <td><?php echo $row['ordenid']?></td>
                <td><?php echo $row['empleado_id']?></td>
                <td><?php echo $row['clienteid']?></td>
                <td><?php echo $row['fechaorden']?></td>
                <td><?php echo $row['descuento']?></td>
                <td>
                <a href="edid_ordenes.php?id=<?php echo $row['ordenid']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_orden.php?id=<?php echo $row['ordenid']?>" class="btn btn-danger">
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