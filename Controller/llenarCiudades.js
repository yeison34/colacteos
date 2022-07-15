
$(document).ready(function(){
    $('#departamento').change(function(){
        cargar();
    });
});

function cargar(){
    $.ajax({
        type: "POST",
        url: "../View/cargarCiudades.php",
        data: "nom_dpto=" + $('#departamento').val(),
        success:function(r){
            $('#ciudad').html(r);
        }
    });
}