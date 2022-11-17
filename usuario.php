<?php
include_once('db.php');

    //realizamos la consulta en la base de datos
    $conectar=conn();
    $consulta="SELECT * FROM `usuarios`";
    $ejecutar = mysqli_query($conectar,$consulta);

    $row=mysqli_fetch_array($ejecutar);
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
            <div class="logo">
              <img src="./imagenes/logoRatingSoft.jpg" alt="logo RatingSoft">
            </div>
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
                    <input type="text" class="form-control form-control-sm" name="nombres" placeholder="Ingrese su Nombre" required>
                  <input type="text" class="form-control form-control-sm" name="apellidos" placeholder="Ingrese su Apellido" required>
                  <input type="email" class="form-control form-control-sm" name="correo" placeholder="Ingrese su Correo" required>
                  <input type="text" class="form-control form-control-sm" name="usuario" placeholder="Ingrese su Usuario" required>
                  <input type="password" class="form-control form-control-sm" name="clave" placeholder="Ingrese su Contraseña" required>


                  <input type="submit" name="insertar" value="agregar">
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


                <th><a href="actualizar.php? id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-info">Editar</a></th>
                <th><a href="delete.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">Eliminar</a></th>

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