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
            <form action="save_task_productos.php" method="POST">
                <div class="form-group">
                    <!--<input type="number" name="orden_id" class="form-control"
                    placeholder="Orden ID" autofocus><br>-->
                    <!--<input type="number" name="productoid" class="form-control"
                    placeholder="Producto ID" autofocus><br>-->             
                    <input type="text" name="descripcion" class="form-control"
                    placeholder="Descripción" autofocus><br>
                    <input type="number" id="totalAmt" name="preciounit" class="form-control"
                    placeholder="Precio Unitario" autofocus><br>
                    <input type="number" name="existencia" class="form-control"
                    placeholder="Existencia" autofocus><br>
                    <input type="number" name="proveedorid" class="form-control"
                    placeholder="Proveedor ID" autofocus><br>
                    <input type="number" name="categoriaid" class="form-control"
                    placeholder="Categoría ID" autofocus><br>
                    
                </div>
                <input type="Submit" class="btn btn-success btn-block" name="save_task_productos" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table  class="table table-bordered">
        <thead>
            <tr>
            <th>Producto Id</th>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Existencia</th>
            <th>Proveedor ID</th>
            <th>Categoría ID</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query ="SELECT * FROM productos";
            $resultado_productos = mysqli_query($conexion, $query);
          //Recorrer la tabla para pintarla
            while($row = mysqli_fetch_array($resultado_productos)){?>
            <tr>
                <td><?php echo $row['productoid']?></td>
                <td><?php echo $row['descripcion']?></td>
                <td><?php echo $row['preciounit']?></td>
                <td><?php echo $row['existencia']?></td>
                <td><?php echo $row['proveedorid']?></td>
                <td><?php echo $row['categoriaid']?></td>
                <td>
                <a href="edid_productos.php?id=<?php echo $row['productoid']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="delete_productos.php?id=<?php echo $row['productoid']?>" class="btn btn-danger">
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