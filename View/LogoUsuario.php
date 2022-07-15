<?php
	session_start();
	include_once ("../Model/Conexion.php");
	$cod_usuario=null;
	$nom_usuario=null;
	$resultado=null;
	$img=null;
	$url_img="../img/usuario.png";
	$direccion="";
	if(isset($_SESSION['usuario'])){
		$cod_usuario=$_SESSION['usuario'];
		$conexion=new Conexion();
		$conexion=$conexion->getConection();

		if(isset($_SESSION['usuario'])){
			$img="";
			$sql1="SELECT nombre_administrador,apellido_administrador,url_foto FROM administrador join usuario on id_usuario=cod_administrador WHERE cod_administrador='$cod_usuario'";
			$sql2="SELECT nom_empresa,url_foto,direccion FROM proveedor join usuario on id_usuario=nit_empresa where nit_empresa='$cod_usuario'";		
			$stament=$conexion->query($sql1);
			$resultado=$stament->fetch(PDO::FETCH_ASSOC);
			if($resultado>0){
				$img=$resultado['url_foto'];

				if(!empty($img)|| $img!=null){
					$url_img="../imagenes_usuarios/$img";
				}else{
					$url_img="../img/usuario.png";
				}
				$nom_usuario=$resultado['nombre_administrador']." ".$resultado['apellido_administrador'];
			
			}else{
				$stament=$conexion->query($sql2);
				$resultado=$stament->fetch(PDO::FETCH_ASSOC);
				if($resultado>0){
					$img=$resultado['url_foto'];
					if(empty($img)|| $img==null){
						$url_img="../img/usuario.png";
					}else{
						$url_img="../proveedores/$img";
					}
					$nom_usuario=$resultado['nom_empresa'];
					$direccion=$resultado['direccion'];
				}
			}
		}else{
			$nom_usuario="";
		}	
	}else{
		$mensaje="";
	}		
?>

<div class="logo-user">
	<ul>
		<li class="container-img"><a href="#"><img src="<?php echo $url_img; ?>"><a/>
			<ul>
				<li>Usuario:
					<?php echo $cod_usuario; ?>			
				</li>
				<li>Nombres: 
						<?php echo $nom_usuario; ?>	
				</li>
				<ul>
					<li><a href="modificarProveedor.php">Editar Perfil</a></li>
					<li><a href="../Model/logout.php">Salir<a/></li>
				</ul>
			</ul>
		</li>
	</ul>	
</div>