<?php
include_once('db.php');
//recivo los datos del formulario
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];


if(isset($_POST['accion'])){
  if($_POST['accion']=="agregar"){
    $conectar=conn();//iniciamos la base de datos
    $sql= "INSERT INTO `usuarios` (`nombre`, `apellido`, `correo`, `usuario`, `clave`)
    VALUES ('$nombres', '$apellidos', '$correo', '$usuario', '$clave')";
    $resul= mysqli_query($conectar , $sql) or trigger_error("Query Failed! SQL- Error: ".mysqli_error ($conectar));
  }
  if($_POST['accion']=="editar"){
    $id_usuario=$_POST['id_usuario'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $conectar=conn();   
    $consulta="UPDATE `usuarios` SET `nombre` = '$nombres', `apellido` = '$apellidos', `correo` = '$correo', `usuario` = '$usuario', `clave` = '$clave' WHERE `usuarios`.`id_usuario` = '$id_usuario'";
    $ejecutar=mysqli_query($conectar,$consulta);

  }  
}
 header("location:usuario.php");
?>