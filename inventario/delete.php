<?php 

	include_once 'conexion.php';
	if(isset($_GET['codigo'])){
		$id=(int) $_GET['codigo'];
		$delete=$con->prepare('DELETE FROM productos WHERE codigo=:codigo');
		$delete->execute(array(
			':codigo'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>