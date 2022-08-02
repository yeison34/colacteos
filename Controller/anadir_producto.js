$('document').ready(function(){
    var cantidad=$(".fila").children().length;
    for(var i=0;i<cantidad;i++){
        acciones(i);
    }
});

function acciones(iterador){
    $("#compra"+iterador).click((e)=>{
        var texto="";
        texto=$("#compra"+iterador).attr('href');
        console.log(texto);
        var resul=texto.split(/=|&|id_proveedor|nombre|id_producto|descripcion|precio|#/g);
        $(".valor1").attr('value',resul[3]);
        $(".valor2").attr('value',resul[6]);
        $(".valor3").attr('value',resul[9]);
        $(".valor4").attr('value',resul[12]);
        $(".valor5").attr('value',"$"+resul[15]);
        
        $('.container-modal').addClass("container-modal-visible");
        $('.container-modal').removeClass("container-modal-invisible");
    });
    
    $(".cerrar").click((e)=>{
        $('.container-modal').removeClass("container-modal-visible");
        $('.container-modal').addClass("container-modal-invisible");
    });
}





