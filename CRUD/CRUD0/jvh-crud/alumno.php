<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM persona";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
        <div class="container-fluid">
          <a class="navbar-brand" target="_blank" href="https://www.ipn.mx/" class="d-inline-block align-text-top" style="font-size: medium;">
            <img src="../../../Img/ipn.png" alt="ESCOM logo" width="30" height="25">
             IPN
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../../../index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../../../Recuperacion_de_horario.html">Horario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../../../Pagina_principal.html">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Tecnologías para el Desarrollo de Aplicaciones Web</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    </head>
    <body>
        <br><br><br><br>
    <a href="meter.php?id=<?php echo $row['idpersona'] ?>" class="btn btn-info">Nuevo Registro</a>
            <div class="container mt-5">
                    <div class="row"> 
                        
                
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Fecha</th>
                                        <th>Genero</th>
                                        <th>CURP</th>
                                        <th>Boleta</th>
                                        <th>Alcaldia</th>
                                        <th>Colonia</th>
                                        <th>CP</th>
                                        <th>Calle</th>
                                        <th>Numero ext</th>
                                        <th>Numero int</th>
                                        <th>Tel</th>
                                        <th>Escuela</th>
                                        <th>Entidad federativa</th>
                                        <th>Promedio</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['idpersona']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['papellido']?></th>
                                                <th><?php  echo $row['sapellido']?></th>   
                                                <th><?php  echo $row['fecha']?></th>
                                                <th><?php  echo $row['genero']?></th>
                                                <th><?php  echo $row['curp']?></th>
                                                <th><?php  echo $row['numbol']?></th>
                                                <th><?php  echo $row['alcaldia']?></th>
                                                <th><?php  echo $row['colonia']?></th>
                                                <th><?php  echo $row['cp']?></th>
                                                <th><?php  echo $row['calle']?></th>
                                                <th><?php  echo $row['numerocasaext']?></th>
                                                <th><?php  echo $row['numerocasaint']?></th>
                                                <th><?php  echo $row['tel']?></th>
                                                <th><?php  echo $row['correo']?></th> 
                                                <th><?php  echo $row['escuela']?></th>
                                                <th><?php  echo $row['entife']?></th>
                                                <th><?php  echo $row['promedio']?></th>
                                                <th><a href="actualizar.php?id=<?php echo $row['idpersona'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['idpersona'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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