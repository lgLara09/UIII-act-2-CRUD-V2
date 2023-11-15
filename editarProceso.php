<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $id_empleado = $_POST['txtid_empleado'];
    $nombre_empleado = $_POST['txtnombre_empleado'];
    $apellido = $_POST['txtapellido'];
    $fecha_nacimiento = $_POST['txtfecha_nacimiento'];
    $puesto = $_POST['txtpuesto'];
    $correo_electronico = $_POST['txtcorreo_electronico'];
    $telefono = $_POST['txttelefono'];
    $domicilio = $_POST['txtdomicilio'];

    $sentencia = $bd->prepare("UPDATE tbl_empleado SET id_empleado = ?, nombre_empleado = ?, apellido = ?, fecha_nacimiento = ?, puesto = ?, correo_electronico = ?, telefono = ?, domicilio = ? where id = ?;");
    $resultado = $sentencia->execute([$id_empleado, $nombre_empleado, $apellido, $fecha_nacimiento, $puesto, $correo_electronico, $telefono, $domicilio, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>