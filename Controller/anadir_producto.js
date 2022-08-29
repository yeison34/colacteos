$('document').ready(function(){
    var cantidad=$(".fila").children().length;
    for(var i=0;i<cantidad;i++){
        acciones(i);
    }
});

function acciones(iterador){
    var c;
    $("#compra"+iterador).click((e)=>{
        var texto="";
        texto=$("#compra"+iterador).attr('href');
        console.log(texto);
        var resul=texto.split(/=|&|id_proveedor|nombre|id_producto|descripcion|precio|stock|#/g);
        console.log(resul);
        $(".valor1").attr('value',resul[3]);
        $(".valor2").attr('value',resul[6]);
        $(".valor3").attr('value',resul[9]);
        $(".valor4").attr('value',resul[12]);
        $(".valor5").attr('value',"$"+resul[15]);
        c=resul[18];
        $('.container-modal').addClass("container-modal-visible");
        $('.container-modal').removeClass("container-modal-invisible");
    });
    
    $(".cerrar").click((e)=>{
        $('.container-modal').removeClass("container-modal-visible");
        $('.container-modal').addClass("container-modal-invisible");
    });

    $(".cantidad").keyup(function(){
        console.log("cantidad"+c);
        //console.log($("#cantidad").val());
        if($(".cantidad").val()>c){
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





