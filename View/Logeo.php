	<?php 
			session_start();
			include_once ("Header.php");
			include_once ("../Model/ConsultarRegistros.php");
			$usuario=$_POST['usuario'];
			$contrasena=$_POST['contrasena'];
			$consultar=new Consultar($usuario);
			$resu=$consultar->getResultado();

			if($resu==null){
				echo '<br>el usuario no existe';
			}else{

				if($resu['contrasena']==$contrasena){
					$_SESSION['usuario']=$usuario;
					header("location: PaginaProductos.php");
				}else{
					echo 'Contraseña incorrecta';
				}
				
			}	
		?>
	