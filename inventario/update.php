<?php
	include_once 'conexion.php';

	if(isset($_GET['codigo'])){
		$codigo= $_GET['codigo'];

		$select_buscar=$con->prepare("
			SELECT *FROM productos WHERE codigo =$codigo;"
		);
		$select_buscar->execute();
		$resultado=$select_buscar->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		
		$nombre=$_POST['nombre'];
		$piezas=$_POST['piezas'];
        $codigo=$_GET['codigo'];
		

		if(!empty($codigo) && !empty($nombre) && !empty($piezas)  ){
			
				$consulta_update=$con->prepare(' UPDATE productos SET  
					nombre=:nombre,
					piezas=:piezas,
                    codigo=:codigo
					
					WHERE codigo=:codigo;'
				);
				$consulta_update->execute(array(
					':codigo' =>$codigo,
					':nombre' =>$nombre,
					':piezas' =>$piezas,
					
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>INVENTARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="codigo" value="<?php if($resultado) echo $resultado['codigo']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
                <input type="text" name="piezas" value="<?php if($resultado) echo $resultado['piezas']; ?>" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>