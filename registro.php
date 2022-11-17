<?php
include_once('db.php');
//recivo los datos del formulario
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$conectar=conn();//iniciamos la base de datos
$sql= "INSERT INTO `usuarios` (`nombre`, `apellido`, `correo`, `usuario`, `clave`)
 VALUES ('$nombres', '$apellidos', '$correo', '$usuario', '$clave')";
 $resul= mysqli_query($conectar , $sql) or trigger_error("Query Failed! SQL- Error: ".mysqli_error ($conectar));

 header("location:usuario.php");
?>