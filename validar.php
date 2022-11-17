<?php
include_once('db.php');
//recibimos datos
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectamos con la base de datos
$conectar=conn();
$consulta="SELECT * FROM usuarios where usuario='$usuario' and clave='$clave'";
$resultado=mysqli_query($conectar, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location:inicio.html");
}
else{
    echo "error en la autentificacion";
}
mysqli_free_result($resultado);
mysqli_close($conectar);

?>