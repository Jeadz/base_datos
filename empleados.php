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
            <form action="save_task_empleados.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                   <!-- <input type="number" name="empleado_id" class="form-control"
                    placeholder="Empleado ID" autofocus><br>-->  
                    <input type="text" name="nombre" class="form-control"
                    placeholder="Nombre" autofocus><br>
                    <input type="text" name="apellido" class="form-control"
                    placeholder="Apellido" autofocus><br>
                    <input type="date" name="fecha_nac" class="form-control"
                    placeholder="Fecha Nacimiento" autofocus><br>
                    <input type="number" name="reporta_a" class="form-control"
                    placeholder="Reporta a:" autofocus><br>
                    <input type="number" name="extension" class="form-control"
                    placeholder="Extensión" autofocus><br>
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_empleado" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Empleado ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Reporta a:</th>
            <th>Extensión</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM empleados";
            $resultado_empleados = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_empleados)){?>
            <tr>
                <td><?php echo $row['empleado_id']?></td>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['apellido']?></td>
                <td><?php echo $row['fecha_nac']?></td>
                <td><?php echo $row['reporta_a']?></td>
                <td><?php echo $row['extension']?></td>
                <td>
                <a href="edid_empleados.php?id=<?php echo $row['empleado_id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_empleados.php?id=<?php echo $row['empleado_id']?>" class="btn btn-danger">
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