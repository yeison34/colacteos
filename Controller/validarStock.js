/*$(document).ready(function(){
    var cantidad=$(".fila").children().length;
    for(var i=0;i<cantidad;i++){
        acciones(i);
    }
    
});

function acciones(i){
    $(".cantidad").keyup(function(){
        
        //console.log($("#cantidad").val());
        if($(".cantidad").val()>1000){
            //console.log("SE EXEDIO");
            $(".texto-advertencia").html("No se enceuntra disponible esa cantidad");
            $(".cantidad").addClass("borde-rojo");
        }else{
            //console.log("");
            $(".texto-advertencia").html("");
            $("#cantidad").removeClass("borde-rojo");
        }
    });
}
*/