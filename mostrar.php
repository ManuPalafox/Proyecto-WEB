<?php 

	$conexion=mysqli_connect('localhost','root','','form');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Datos de los alumnos registrados</title>
</head>
<body>
    <a href="agregar.php">Nuevo Registro</a><br><br>
<br>

	<table border="0" >
        <thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Primer Apellido</td>
			<td>Segundo Apellido</td>
			<td>Fecha</td>	
            <td>Genero</td>
			<td>Curp</td>
			<td>Numero de boleta</td>
			<td>Alcaldia</td>
			<td>Colonia</td>	
            <td>C.P.</td>
			<td>Calle</td>
			<td>Num. exterior</td>
			<td>Num. interior</td>
			<td>Tel</td>
            <td>Correo</td>
			<td>Escuela</td>
			<td>Entidad federativa</td>	
            <td>Promedio</td>	
            <td>Acciones</td>
		</tr>
        </thead>

        <tbody>
		<?php 
		$sql="SELECT * from persona";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['idpersona'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['papellido'] ?></td>
			<td><?php echo $mostrar['sapellido'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td>
            <td><?php echo $mostrar['genero'] ?></td>
			<td><?php echo $mostrar['curp'] ?></td>
			<td><?php echo $mostrar['numbol'] ?></td>
			<td><?php echo $mostrar['alcaldia'] ?></td>
			<td><?php echo $mostrar['colonia'] ?></td>
            <td><?php echo $mostrar['cp'] ?></td>
			<td><?php echo $mostrar['calle'] ?></td>
			<td><?php echo $mostrar['numerocasaext'] ?></td>
			<td><?php echo $mostrar['numerocasaint'] ?></td>
			<td><?php echo $mostrar['tel'] ?></td>
            <td><?php echo $mostrar['correo'] ?></td>
            <td><?php echo $mostrar['escuela'] ?></td>
			<td><?php echo $mostrar['entife'] ?></td>
			<td><?php echo $mostrar['promedio'] ?></td>
            <td>
                <?php echo "<a href='editar.php?idpersona=".$mostrar['idpersona']."'>EDITAR</a>"; ?>
                -
                <?php echo "<a href=''>ELIMINAR</a>"; ?>
            </td>
			
		</tr>
        </tbody>
	<?php 
	}
	 ?>
	</table>

</body>
</html>