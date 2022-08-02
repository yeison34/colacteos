<?php
	session_start();
	include_once("../Model/Proveedor/Proveedor.php");
	include_once("../Model/Conexion.php");
	if(isset($_SESSION['proveedor'])){
		$proveedor=new Proveedor(null,null,null,null,null,null,null,null);
		$id=$_SESSION['proveedor'];
		$direccion=$_POST['direccion'];
		$estado=$_POST['estado'];
		$ciudad=$_POST['ciudad'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$name_foto=$_FILES['foto']['name'];
		$url_foto;
		$datos=$proveedor->select($id);

		if(($name_foto=="" || $name_foto==null) && ($datos['url_foto']==null || $datos['url_foto']=="")){
			$url_foto="usuario.png";
		}else if(($name_foto=="" || $name_foto==null) && (!empty($datos['url_foto']) || $datos['url_foto']!=null)){
			$url_foto=$datos['url_foto'];
		}else{
			$ruta_temp=$_FILES['foto']['tmp_name'];
			$ruta_destino="../img_proveedores/";
			$url_foto= rand() . rand() .$name_foto;
			move_uploaded_file($ruta_temp,$ruta_destino.$url_foto);
		}

		$conexion=new Conexion();
		$conexion=$conexion->getConection();
		$query_ciudad_now="SELECT *from ciudad where nom_ciudad='$ciudad'";
		$stament_ciudad=$conexion->query($query_ciudad_now);
		$resultado_ciudad_now=$stament_ciudad->fetch(PDO::FETCH_ASSOC);
		$ciudad_now=$resultado_ciudad_now['cod_ciudad'];
		$ciudad=$ciudad_now;
		$proveedor->update($id,$direccion,$estado,$ciudad,$telefono,$correo,$url_foto);
		header("location:EditarPerfilProveedor.php");
	}
?>