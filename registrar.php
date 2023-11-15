<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtid_empleado"]) || empty($_POST["txtnombre_empleado"]) || empty($_POST["txtapellido"]) || empty($_POST["txtfecha_nacimiento"]) || empty($_POST["txtpuesto"]) || empty($_POST["txtcorreo_electronico"]) || empty($_POST["txttelefono"]) || empty($_POST["txtdomicilio"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $id_empleado = $_POST["txtid_empleado"];
    $nombre_empleado = $_POST["txtnombre_empleado"];
    $apellido = $_POST["txtapellido"];
    $fecha_nacimiento = $_POST["txtfecha_nacimiento"];
    $puesto = $_POST["txtpuesto"];
    $correo_electronico = $_POST["txtcorreo_electronico"];
    $telefono = $_POST["txttelefono"];
    $domicilio = $_POST["txtdomicilio"];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_empleado(id_empleado, nombre_empleado, apellido, fecha_nacimiento, puesto, correo_electronico, telefono, domicilio) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$id_empleado,$nombre_empleado,$apellido,$fecha_nacimiento,$puesto,$correo_electronico,$telefono,$domicilio]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>