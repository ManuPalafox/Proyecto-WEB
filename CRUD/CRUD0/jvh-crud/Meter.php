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
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="papellido" placeholder="Primer Apellido">
                                    <input type="text" class="form-control mb-3" name="sapellido" placeholder="Segundo Apellido">
                                    <input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha">
                                    <input type="text" class="form-control mb-3" name="genero" placeholder="Genero">
                                    <input type="text" class="form-control mb-3" name="curp" placeholder="CURP">
                                    <input type="text" class="form-control mb-3" name="numbol" placeholder="Boleta">
                                    <input type="text" class="form-control mb-3" name="alcaldia" placeholder="Alcaldia">
                                    <input type="text" class="form-control mb-3" name="colonia" placeholder="Colonia">
                                    <input type="text" class="form-control mb-3" name="cp" placeholder="C.P.">
                                    <input type="text" class="form-control mb-3" name="calle" placeholder="Calle">
                                    <input type="text" class="form-control mb-3" name="numerocasaext" placeholder="Numero ext">
                                    <input type="text" class="form-control mb-3" name="numerocasaint" placeholder="Numero int">
                                    <input type="text" class="form-control mb-3" name="tel" placeholder="Tel">
                                    <input type="text" class="form-control mb-3" name="correo" placeholder="Correo">
                                    <input type="text" class="form-control mb-3" name="escuela" placeholder="Escuela">
                                    <input type="text" class="form-control mb-3" name="entife" placeholder="Entife">
                                    <input type="text" class="form-control mb-3" name="promedio" placeholder="Promedio">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>