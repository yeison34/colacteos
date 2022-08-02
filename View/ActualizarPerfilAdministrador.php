<?php
	session_start();
	include_once("../Model/Administrador/Administrador.php");
	include_once("../Model/Conexion.php");
	if(isset($_SESSION['administrador'])){
		$administrador=new Administrador(null,null,null,null,null,null,null,null);
		$id=$_SESSION['administrador'];
        $ciudad=$_POST['ciudad'];
        $telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$direccion=$_POST['direccion'];		
		$name_foto=$_FILES['foto']['name'];
		$url_foto;
		$datos=$administrador->select($id);

		if(($name_foto=="" || $name_foto==null) && ($datos['url_foto']==null || $datos['url_foto']=="")){
			$url_foto="usuario.png";
		}else if(($name_foto=="" || $name_foto==null) && (!empty($datos['url_foto']) || $datos['url_foto']!=null)){
			$url_foto=$datos['url_foto'];
		}else{
			$ruta_temp=$_FILES['foto']['tmp_name'];
			$ruta_destino="../img_administradores/";
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
		$administrador->update($id,$direccion,$ciudad,$telefono,$correo,$url_foto);
		header("location:EditarPerfilAdmin.php");
	}
?>