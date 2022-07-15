<?php
	session_start();
	include_once ("../Model/Conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$name=$_FILES['foto']['name'];
		$tem=$_FILES['foto']['tmp_name'];
		$ruta="";
		$complemento=rand() . rand() . $name;
		//move_uploaded_file($tem,$ruta.$complemento);
		$conexion=new Conexion();
		$conexion=$conexion->getConection();
		$sqlv="SELECT *FROM proveedor where nit_empresa='$usuario'";
		$stament=$conexion->query($sqlv);
		$resultado=$stament->fetch(PDO::FETCH_ASSOC);
		if($resultado>0){
			$ruta=$_SERVER['DOCUMENT_ROOT']."/Colacteos/proveedores/";	
		}else{
			$ruta=$_SERVER['DOCUMENT_ROOT']."/Colacteos/imagenes_usuarios/";
		}
		move_uploaded_file($tem,$ruta.$complemento);
		$sql="UPDATE usuario set url_foto='$complemento' where id_usuario='$usuario'";
		$stament=$conexion->prepare($sql);
		$stament->execute();
		header("location:modificarProveedor.php");
	}else{
		header("location:modificarProveedor.php");
		echo "No existe la seccion";
	}	
?>