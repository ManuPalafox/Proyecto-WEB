<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM persona WHERE idpersona='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="idpersona" value="<?php echo $row['idpersona']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="papellido" placeholder="Nombres" value="<?php echo $row['papellido']  ?>">
                                <input type="text" class="form-control mb-3" name="sapellido" placeholder="Apellidos" value="<?php echo $row['sapellido']  ?>">
                                <input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']  ?>">
                                <input type="text" class="form-control mb-3" name="genero" placeholder="Genero" value="<?php echo $row['genero']  ?>">
                                <input type="text" class="form-control mb-3" name="curp" placeholder="Curp" value="<?php echo $row['curp']  ?>">
                                <input type="text" class="form-control mb-3" name="numbol" placeholder="Boleta" value="<?php echo $row['numbol']  ?>">
                                <input type="text" class="form-control mb-3" name="alcaldia" placeholder="Alcaldia" value="<?php echo $row['alcaldia']  ?>">
                                <input type="text" class="form-control mb-3" name="colonia" placeholder="Colonia" value="<?php echo $row['colonia']  ?>">
                                <input type="text" class="form-control mb-3" name="cp" placeholder="cp" value="<?php echo $row['cp']  ?>">
                                <input type="text" class="form-control mb-3" name="calle" placeholder="Calle" value="<?php echo $row['calle']  ?>">
                                <input type="text" class="form-control mb-3" name="numerocasaext" placeholder="Num ext" value="<?php echo $row['numerocasaext']  ?>">
                                <input type="text" class="form-control mb-3" name="numerocasaint" placeholder="Num int" value="<?php echo $row['numerocasaint']  ?>">
                                <input type="text" class="form-control mb-3" name="tel" placeholder="Tel" value="<?php echo $row['tel']  ?>">
                                <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" value="<?php echo $row['correo']  ?>">
                                <input type="text" class="form-control mb-3" name="escuela" placeholder="Escuela" value="<?php echo $row['escuela']  ?>">
                                <input type="text" class="form-control mb-3" name="entife" placeholder="Entidad federativa" value="<?php echo $row['entife']  ?>">
                                <input type="text" class="form-control mb-3" name="promedio" placeholder="Promedio" value="<?php echo $row['promedio']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>