<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from tbl_empleado where id = ?;");
    $sentencia->execute([$id]);
    $tbl_empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($tbl_empleado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">id_empleado: </label>
                        <input type="text" class="form-control" name="txtid_empleado" required 
                        value="<?php echo $tbl_empleado->id_empleado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtnombre_empleado" autofocus required
                        value="<?php echo $tbl_empleado->nombre_empleado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtapellido" autofocus required
                        value="<?php echo $tbl_empleado->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" name="txtfecha_nacimiento" autofocus required
                        value="<?php echo $tbl_empleado->fecha_nacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto: </label>
                        <input type="text" class="form-control" name="txtpuesto" autofocus required
                        value="<?php echo $tbl_empleado->puesto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="text" class="form-control" name="txtcorreo_electronico" autofocus required
                        value="<?php echo $tbl_empleado->correo_electronico; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="txttelefono" autofocus required
                        value="<?php echo $tbl_empleado->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Domicilio: </label>
                        <input type="text" class="form-control" name="txtdomicilio" autofocus required
                        value="<?php echo $tbl_empleado->domicilio; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $tbl_empleado->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>