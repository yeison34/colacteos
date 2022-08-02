<?php
	session_start();
	include_once("../Model/Proveedor/Proveedor.php");
    include_once("../Model/Administrador/Administrador.php");
	$usuario;
	$nombre;
	$codigo;
	$url_foto;
	$usuario_online;
	if(isset($_SESSION['administrador'])){
		$id_usuario=$_SESSION['administrador'];
		$usuario=new Administrador(null,null,null,null,null,null,null,null);
		$resultado=$usuario->select($id_usuario);
		$nombre=$resultado['nombre_administrador'] ." ". $resultado['apellido_administrador'];
		$codigo=$resultado['cod_administrador'];
		$url_foto=$resultado['url_foto'];
		if(!empty($url_foto)||$url_foto!=null){
			$url_foto="../img_administradores/" . $resultado['url_foto'];
		}else{
			$url_foto="../img_administradores/usuario.png";
		}
		$usuario_oline="admin";
	}else if(isset($_SESSION['proveedor'])){
		$id_usuario=$_SESSION['proveedor'];
		$usuario=new Proveedor(null,null,null,null,null,null,null,null);
		$resultado=$usuario->select($id_usuario);
		$nombre=$resultado['nom_empresa'];
		$codigo=$resultado['nit_empresa'];
		$url_foto=$resultado['url_foto'];
		if(!empty($url_foto)||$url_foto!=null){
			$url_foto="../img_proveedores/" . $resultado['url_foto'];
		}else{
			$url_foto="../img_proveedores/usuario.png";
		}
		$usuario_oline="proveedor";
	}	
?>

<div class="logo-user">
	<ul>
		<li class="container-img"><a href="#"><img src="<?php echo $url_foto; ?>"></a>
			<ul>
				<li>Usuario:
					<?php echo $codigo; ?>			
				</li>
				<li>Nombres: 
						<?php echo $nombre; ?>	
				</li>
				<ul>
					<li><a href="<?php if(strcmp($usuario_oline,"admin")==0){ echo 'EditarPerfilAdmin.php';}else{ echo 'EditarPerfilProveedor.php';}?>">Editar Perfil</a></li>
					<li><a href="../Model/logout.php">Salir</a></li>
				</ul>
			</ul>
		</li>
	</ul>	
</div>