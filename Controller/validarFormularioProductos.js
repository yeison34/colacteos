
var verificarNumeros=/^\d+$/;
var verificarLetras=/^[A-Za-zñÑ ]+$/;
var verificarDecimales=/^\d+(\.\d+)?$/;
var verificarDescripcion=/^[A-Za-z0-9ñÑ ]+$/;


var codigo_producto = document.getElementById('codigo_producto');
var nombre_producto = document.getElementById('nombre-producto');
var descripcion = document.getElementById('descripcion');
var precio = document.getElementById('precio');

var boton = document.getElementById('enviar');
var banderaCodigo=true;
var banderaNombre=true;
var banderaDescripcion=true;
var banderaPrecio=true;

function camposObligatorios(campo,etiqueta){
	if(campo.value==""){
		document.getElementById('mensaje-error-'+etiqueta).innerHTML="* Campo obligatorio";
		boton.disabled=true;
	}
}

function validarCampos(etiqueta,campo,tipo,bandera){
	switch(tipo){
		case "texto":
			if(!verificarLetras.test(campo.value)||campo.value==""){
				campo.classList.remove('input-ok');
				campo.classList.add('input-error');
				if(campo.value==""){
					bandera=true;
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="* Campo obligatorio";
				}else{
					bandera=true;
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="Ingrese valores validos para texto";
				}
			}else{
				bandera=false;
				campo.classList.remove('input-error');
				campo.classList.add('input-ok');
				document.getElementById('mensaje-error-'+etiqueta).innerHTML="";
			}
			if(bandera==false){
				boton.disabled=false;
			}
			break;
		case "numeros":
				if(!verificarNumeros.test(campo.value)||campo.value==""){
					campo.classList.remove('input-ok');
					campo.classList.add('input-error');
					if(campo.value==""){
						document.getElementById('mensaje-error-'+etiqueta).innerHTML="* Campo obligatorio";
						bandera=true;
					}else{
						bandera=true;
						document.getElementById('mensaje-error-'+etiqueta).innerHTML="Ingresar solo valores numericos";
					}
					
				}else{
					bandera=false;
					campo.classList.remove('input-error');
					campo.classList.add('input-ok');
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="";
				}
				if(bandera==false){
					boton.disabled=false;
				}
			break;
		case "decimales":
				if(!verificarDecimales.test(campo.value)||campo.value==""){
					campo.classList.remove('input-ok');
					campo.classList.add('input-error');
					if(campo.value==""){
						bandera=true;
						document.getElementById('mensaje-error-'+etiqueta).innerHTML="* Campo obligatorio";
					}else{
						bandera=true;
						document.getElementById('mensaje-error-'+etiqueta).innerHTML="Ingresar solo valores numericos";
					}
					
				}else{
					bandera=false;
					campo.classList.remove('input-error');
					campo.classList.add('input-ok');
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="";
				}
				
				if(bandera==false){
					boton.disabled=false;
				}
			break;	
		case "alfanumericos":
			if(!verificarDescripcion.test(campo.value)||campo.value==""){
				campo.classList.remove('input-ok');
				campo.classList.add('input-error');
				if(campo.value==""){
					bandera=true;
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="* Campo obligatorio";
				}else{
					bandera=true;
					document.getElementById('mensaje-error-'+etiqueta).innerHTML="Ingrese valores validos para texto";
				}
			}else{
				bandera=false;
				campo.classList.remove('input-error');
				campo.classList.add('input-ok');
				document.getElementById('mensaje-error-'+etiqueta).innerHTML="";
			}
			if(bandera==false){
				boton.disabled=false;
			}
			break;

	}
}

camposObligatorios(codigo_producto,'codigo');
camposObligatorios(nombre_producto,'nombre');
camposObligatorios(descripcion,'descripcion');
camposObligatorios(precio,'precio');


codigo_producto.addEventListener('keyup',(e)=>{
	validarCampos('codigo',codigo_producto,"numeros",banderaCodigo);
	
	
});
codigo_producto.addEventListener('blur',(e)=>{
	validarCampos('codigo',codigo_producto,"numeros",banderaCodigo);

	
});

nombre_producto.addEventListener('keyup',(e)=>{
	validarCampos('nombre',nombre_producto,"texto",banderaNombre);
	
	
});
nombre_producto.addEventListener('blur',(e)=>{
	validarCampos('nombre',nombre_producto,"texto",banderaNombre);
	
});

descripcion.addEventListener('keyup',(e)=>{
	validarCampos('descripcion',descripcion,"alfanumericos",banderaDescripcion);
	
});
descripcion.addEventListener('blur',(e)=>{
	validarCampos('descripcion',descripcion,"alfanumericos",banderaDescripcion);
	
});

precio.addEventListener('keyup',(e)=>{
	validarCampos('precio',precio,"decimales",banderaPrecio);
	
});
precio.addEventListener('blur',(e)=>{
	validarCampos('precio',precio,"decimales",banderaPrecio);
		
});



