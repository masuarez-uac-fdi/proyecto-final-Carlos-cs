<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM inventario ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare("
			SELECT *FROM productos WHERE codigo =$buscar_text;"
		);

		$select_buscar->execute();

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>INVENTARIO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
            
		</div>
		<table>
			<tr class="head">
				<td>codigo</td>
				<td>Nombre</td>
				<td>Piezas</td>
				
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
                
				<tr >
                    
					<td><?php echo $fila['codigo']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['piezas']; ?></td>
					<td><a href="update.php?codigo=<?php echo $fila['codigo']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?codigo=<?php echo $fila['codigo']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>