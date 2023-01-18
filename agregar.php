<html>
    <head>
        <tittle></tittle>
    </head>

    <body>
        <?php
        if(isset($_POST['enviar'])){
            $Nombre_pila = $_POST["pila"];
            $AP = $_POST["AP"];
            $AM = $_POST["AM"];
            $FN = $_POST["FN"];
            $Gen = $_POST["Gen"];
            $CURP = $_POST["CURP"];
            $NB = $_POST["NB"];
            $ALC = $_POST["ALC"];
            $Col = $_POST["Col"];
            $CP = $_POST["CP"];
            $NC = $_POST["NC"];
            $NE = $_POST["NE"];
            $NI = $_POST["NI"];
            $Tel = $_POST["Tel"];
            $C = $_POST["C"];
            $EscPorc = $_POST["EscProc"];
            $EFP = $_POST["EFP"];
            $Prom = $_POST["Prom"];

            include("conexion.php");
            $sql="INSERT INTO persona(nombre,papellido,sapellido,fecha,genero,curp,numbol,alcaldia,colonia,cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio) VALUES('".$Nombre_pila."' , '".$AP."' , '".$AM."' , '".$FN."' , '".$Gen."' , '".$CURP."' , '".$NB."' , '".$ALC."' , '".$Col."' , '".$CP."' , '".$NC."' , '".$NE."' , '".$NI."' , '".$Tel."' , '".$C."' , '".$EscPorc."' , '".$EFP."' , '".$Prom."')";

            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo "<script language='JavaScript'>
                alert('Los datos fueron ingresados correctamente a la BD');
                location.assing('mostrar.php');
                </script>";
            }else{
                echo "<script language='JavaScript'>
                alert('Los datos NO fueron ingresados correctamente a la BD');
                location.assing('mostrar.php');
                </script>";
            }
            mysqli_close($conexion);


        }else{
            
        ?>

        <h1>Agregar nuevo alumno</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <lable>Nombre: </lable>
            <input type="text" name="pila"><br>
            <lable>Primer Apellido: </lable>
            <input type="text" name="AP"><br>
            <lable>Segundo Apellido: </lable>
            <input type="text" name="AM"><br>
            <lable>Fecha: </lable>
            <input type="text" name="FN"><br>
            <lable>Genero: </lable>
            <input type="text" name="Gen"><br>
            <lable>CURP: </lable>
            <input type="text" name="CURP"><br>
            <lable>Numero de boleta: </lable>
            <input type="text" name="NB"><br>
            <lable>Alcaldia: </lable>
            <input type="text" name="ALC"><br>
            <lable>Colonia: </lable>
            <input type="text" name="Col"><br>
            <lable>C.P.: </lable>
            <input type="text" name="CP"><br>
            <lable>Calle: </lable>
            <input type="text" name="NC"><br>
            <lable>Num ext: </lable>
            <input type="text" name="NE"><br>
            <lable>Num int: </lable>
            <input type="text" name="NI"><br>
            <lable>Tel: </lable>
            <input type="text" name="Tel"><br>
            <lable>Correo: </lable>
            <input type="text" name="C"><br>
            <lable>Escuela: </lable>
            <input type="text" name="EscProc"><br>
            <lable>Entidad federativa: </lable>
            <input type="text" name="EFP"><br>
            <lable>Promedio: </lable>
            <input type="text" name="Prom"><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="mostrar.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</html>