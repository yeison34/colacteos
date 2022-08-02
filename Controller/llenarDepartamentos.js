$(document).ready(function(){
    $('#pais').change(function(){
        cargarDatos();
    });
});


function cargarDatos(){
    $.ajax({
        type:"POST",
        url:"../View/cargarDepartamentos.php",
        data:"id_pais=" +$('#pais').val(),
        success:function(r){
            $('#departamento').html(r);
        }
    });
}

