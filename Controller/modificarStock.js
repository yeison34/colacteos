$(document).ready(function(){
        var cantidad=$(".padre").children().length;
        //console.log(cantidad);
        for(var i=0;i<cantidad;i++){
            acciones(i-1);
        }
    
});

function acciones(i){
    $("#ide"+i).click(function(){
            var id="";
            id=$("#ide"+i).attr('href');
            var codigo=id.replace(/[A-Za-z=#'?']/g,"");
            //console.log(codigo);
            $(".almacen-container").addClass("container-almacen-visible");
            $(".container-modal-almacen").addClass("container-almacen-visible");
            $(".codigo").attr("value",codigo);
    });
        
}