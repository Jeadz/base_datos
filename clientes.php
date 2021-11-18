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
            <form action="save_task_cliente.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                    <!--<input type="number" name="cliente_id" class="form-control"
                    placeholder="Cliente ID" autofocus><br> -->            
                    <input type="number" name="cedula_ruc" class="form-control"
                    placeholder="Cédula" autofocus><br>
                    <input type="text" name="nombrecia" class="form-control"
                    placeholder="Nombrecia" autofocus><br>
                    <input type="text" name="nombrecontacto" class="form-control"
                    placeholder="Nombre Contacto" autofocus><br>
                    <input type="text" name="direccioncli" class="form-control"
                    placeholder="Dirección Cliente" autofocus><br>
                    <input type="text" name="fax" class="form-control"
                    placeholder="Fax" autofocus><br>
                    <input type="text" name="email" class="form-control"
                    placeholder="E-mail" autofocus><br>
                    <input type="text" name="celular" class="form-control"
                    placeholder="Celular" autofocus><br>
                    <input type="text" name="fijo" class="form-control"
                    placeholder="Fijo" autofocus><br>
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_cliente" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Cliente Id</th>
            <th>Cédula</th>
            <th>Nombrecia</th>
            <th>Nombre Contácto</th>
            <th>Dirección Cliente</th>
            <th>Fax</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Fijo</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM clientes";
            $resultado_ordenes = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_ordenes)){?>
            <tr>
                <td><?php echo $row['clienteid']?></td>
                <td><?php echo $row['cedula_ruc']?></td>
                <td><?php echo $row['nombrecia']?></td>
                <td><?php echo $row['nombrecontacto']?></td>
                <td><?php echo $row['direccioncli']?></td>
                <td><?php echo $row['fax']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['celular']?></td>
                <td><?php echo $row['fijo']?></td>
                <td>
                <a href="edid_clientes.php?id=<?php echo $row['clienteid']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_clientes.php?id=<?php echo $row['clienteid']?>" class="btn btn-danger">
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