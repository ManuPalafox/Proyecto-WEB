<?php
    include("conexion.php");
?>
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

                $sql="update persona set pila='".$Nombre_pila."' , AP='".$AP."' , AM='".$AM."' , FN='".$FN."' , Gen='".$Gen."' , CURP='".$CURP."' , NB='".$NB."' , ALC='".$ALC."' , Col='".$Col."' , CP='".$CP."' , NC='".$NC."' , NE='".$NE."' , NI='".$NI."' , Tel='".$Tel."' , C='".$C."' , EscProc='".$EscPorc."' , EFP='".$EFP."' , Prom='".$Prom."' where idpersona='".$id."'";
                $resultado=mysqli_query($conexion,$sql);
                if($resultado){
                    echo "<script language='JavaScript'>
                    alert('Los datos fueron actualizados correctamente a la BD');
                    location.assing('fila.php');
                    </script>";
                }else{
                    echo "<script language='JavaScript'>
                    alert('Los datos NO fueron actualizados correctamente a la BD');
                    location.assing('fila.php');
                    </script>";
                }
                mysqli_close($conexion);

            }else{
                $id=$_GET['idpersona'];
                $sql="select * from persona(nombre,papellido,sapellido,fecha,genero,curp,numbol,alcaldia,colonia,cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio) where idpersona='".$id."'";
                $resultado=mysqli_query($conexion,$sql);

                $fila=mysqli_fetch_assoc($resultado);
                $Nombre_pila = $fila["pila"];
                $AP = $fila["AP"];
                $AM = $fila["AM"];
                $FN = $fila["FN"];
                $Gen = $fila["Gen"];
                $CURP = $fila["CURP"];
                $NB = $fila["NB"];
                $ALC = $fila["ALC"];
                $Col = $fila["Col"];
                $CP = $fila["CP"];
                $NC = $fila["NC"];
                $NE = $fila["NE"];
                $NI = $fila["NI"];
                $Tel = $fila["Tel"];
                $C = $fila["C"];
                $EscPorc = $fila["EscProc"];
                $EFP = $fila["EFP"];
                $Prom = $fila["Prom"];

            mysqli_close($conexion);


                
        ?>
        <h1>Editar</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
             <lable>Nombre: </lable>
            <input type="text" name="pila" value="<?php echo $Nombre_pila; ?>" ><br>
            <lable>Primer Apellido: </lable>
            <input type="text" name="AP" value="<?php echo $AP; ?>" ><br>
            <lable>Segundo Apellido: </lable>
            <input type="text" name="AM" value="<?php echo $AM; ?>"><br>
            <lable>Fecha: </lable>
            <input type="text" name="FN" value="<?php echo $FN; ?>"><br>
            <lable>Genero: </lable>
            <input type="text" name="Gen" value="<?php echo $Gen; ?>"><br>
            <lable>CURP: </lable>
            <input type="text" name="CURP" value="<?php echo $CURP; ?>"><br>
            <lable>Numero de boleta: </lable>
            <input type="text" name="NB" value="<?php echo $NB; ?>"><br>
            <lable>Alcaldia: </lable>
            <input type="text" name="ALC" value="<?php echo $ALC; ?>"><br>
            <lable>Colonia: </lable>
            <input type="text" name="Col" value="<?php echo $Col; ?>"><br>
            <lable>C.P.: </lable>
            <input type="text" name="CP" value="<?php echo $CP; ?>"><br>
            <lable>Calle: </lable>
            <input type="text" name="NC" value="<?php echo $NC; ?>"><br>
            <lable>Num ext: </lable>
            <input type="text" name="NE" value="<?php echo $NE; ?>"><br>
            <lable>Num int: </lable>
            <input type="text" name="NI" value="<?php echo $NI; ?>"><br>
            <lable>Tel: </lable>
            <input type="text" name="Tel" value="<?php echo $Tel; ?>"><br>
            <lable>Correo: </lable>
            <input type="text" name="C" value="<?php echo $C; ?>"><br>
            <lable>Escuela: </lable>
            <input type="text" name="EscProc" value="<?php echo $EscPorc; ?>"><br>
            <lable>Entidad federativa: </lable>
            <input type="text" name="EFP" value="<?php echo $EFP; ?>"><br>
            <lable>Promedio: </lable>
            <input type="text" name="Prom" value="<?php echo $Prom; ?>"><br>

            <input type="hidden" name="idpersona" value="<?php echo $id; ?>">

            <input type="submit" name="enviar" value="ACTUALIZAR">
            <a href="fila.php">Regresar</a>
        </form>
        <?php
            }
        ?>
    </body>
</html>