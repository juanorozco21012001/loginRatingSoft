<?php
    include_once('db.php');
    $conectar=conn();

    $id_usuario=$_GET['id_usuario'];

    // $consulta="DELETE FROM usuarios WHERE id_usuario= $id_usuario";
    echo $id_usuario;
    $consulta="DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = '$id_usuario'";
    $ejecutar = mysqli_query($conectar,$consulta);

        if($ejecutar){
            Header("location:usuario.php");
        }
?>