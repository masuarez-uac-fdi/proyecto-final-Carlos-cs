<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$piezas=$_POST['piezas'];

		if(!empty($codigo) && !empty($nombre) && !empty($piezas) ){
			
				$consulta_insert=$con->prepare('INSERT INTO productos(codigo,nombre,piezas) VALUES(:codigo,:nombre,:piezas)');
				$consulta_insert->execute(array(
					':codigo' =>$codigo,
					':nombre' =>$nombre,
					':piezas' =>$piezas
				));
				header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="codigo" placeholder="Codigo" class="input__text">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
                <input type="text" name="piezas" placeholder="Piezas" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
