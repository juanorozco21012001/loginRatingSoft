<?php
include_once('db.php');

    //realizamos la consulta en la base de datos
    $conectar=conn();
    $consulta="SELECT * FROM `usuarios`";
    $ejecutar = mysqli_query($conectar,$consulta);


    echo "<br>";
    echo "<hr>";
    //print_r($r);
    echo "<hr>";
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/usuarios.css">
    <link rel="shortcut icon" href="./imagenes/logoRatingSoft.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>RatingSoft / usuarios</title>
</head>
<body>
    <header>
        <div class="header_superior">
            <!--<div class="logo">
              <img src="./imagenes/logoRatingSoft.jpg" alt="logo RatingSoft">
            </div>-->
            <div class="search">
              <input type="search" placeholder="¿Qué deseas buscar?">
            </div>
          </div>
    </header>

    <div class="container mt-5" >
      <div class="row" >
        <div class="col-md-3">
          <form method="post" action="registro.php">
              <table class="table_usuarios">
                <tr>

                  <td>
                    <?php
                      if(isset($_POST["accion"])){
                        echo '<input type="hidden" name="accion" id="accion" value="'.$_POST["accion"].'" required>';
                        echo '<input type="hidden" name="id_usuario" id="accion" value="'.$_POST["edi_id"].'" required>';
                        echo '<input type="text" class="form-control form-control-sm" value="'.$_POST["edi_nombre"].'" name="nombres" required>';      
                        echo '<input type="text" class="form-control form-control-sm" value="'.$_POST["edi_apellido"].'" name="apellidos"  required>';
                        echo '<input type="email" class="form-control form-control-sm" value="'.$_POST["edi_correo"].'" name="correo" placeholder="Ingrese su Correo" required>';
                        echo '<input type="text" class="form-control form-control-sm" value="'.$_POST["edi_usuario"].'" name="usuario" placeholder="Ingrese su Usuario" required>';
                        echo '<input type="password" class="form-control form-control-sm" value="'.$_POST["edi_clave"].'" name="clave" placeholder="Ingrese su Contraseña" required>';
                      }else{
                        echo '<input type="hidden" name="accion" id="accion" value="agregar">';
                        echo '<input type="hidden" name="id_usuario" id="accion" value="">';
                        echo '<input type="text" class="form-control form-control-sm" value="" name="nombres" required>';      
                        echo '<input type="text" class="form-control form-control-sm" value="" name="apellidos"  required>';
                        echo '<input type="email" class="form-control form-control-sm" value="" name="correo" placeholder="Ingrese su Correo" required>';
                        echo '<input type="text" class="form-control form-control-sm" value="" name="usuario" placeholder="Ingrese su Usuario" required>';
                        echo '<input type="password" class="form-control form-control-sm" value="" name="clave" placeholder="Ingrese su Contraseña" required>';
                      }
                    ?>
                  
                  
                  
                  
                  
                  

                  <br>
                  <input type="submit" name="insertar" value="Guardar" class="btn btn-primary">
                  </td>
                </tr>
              </table>
          </form>
        </div>

        <div class="col-md-8">
          <table class="table">
            <thead class="table-success table-striped" >
              <tr>
                <th>Codigo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

          <tbody>
            <?php
              while($row=mysqli_fetch_array($ejecutar)){
            ?>
              <tr>
                <th><?php echo $row['id_usuario']?></th>
                <th><?php echo $row['nombre']?></th>
                <th><?php echo $row['apellido']?></th>
                <th><?php echo $row['correo']?></th>
                <th><?php echo $row['usuario']?></th>
                <th><?php echo $row['clave']?></th>


                <th>
                  <form action="usuario.php" method="post">
                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="edi_id" value="<?php echo $row['id_usuario'] ?>">
                    <input type="hidden" name="edi_nombre" value="<?php echo $row['nombre'] ?>">
                    <input type="hidden" name="edi_apellido" value="<?php echo $row['apellido'] ?>">
                    <input type="hidden" name="edi_correo" value="<?php echo $row['correo'] ?>">
                    <input type="hidden" name="edi_usuario" value="<?php echo $row['usuario'] ?>">
                    <input type="hidden" name="edi_clave" value="<?php echo $row['clave'] ?>">
                    <button type="submit" class="btn btn-primary">Editar</button>
                  </form>
                  <a href="delete.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">Eliminar</a>
                </th>

               </tr>
            <?php
              }
            ?>
            </tbody>
          </table>
        </div>


          
      </div>
    </div>

   
    
</body>
</html>