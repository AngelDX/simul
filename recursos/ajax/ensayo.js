function showFormEnsayo(){    
     
        $.ajax({
            url: "_proxy.php",
            type: "GET",
            data:"controlador=Ensayo&accion=formEnsayo",
            success: function(r){                 
                $("#table").html("");
                $("#table").html(r);
            }           
         });   
}
function showFormEditEnsayo(idaensayo){   
   // alert(idussuario);
        $.ajax({
            url: "_proxy.php",
            type: "GET",
            data:"controlador=Ensayo&accion=formEditEnsayo&ensayoid="+idaensayo,
            success: function(r){                 
                $("#table").html("");
                $("#table").html(r);
            }           
         });  
}


function validarTipoEnsayo(){         
        $.ajax({
            url: "_proxy.php",
            type: "GET",
            data:"controlador=Ensayo&accion=formPasarelaA&tipo="+$("#tipo").val(),
            success: function(r){           
            $("#t_dependencia").html(r);
            }           
         });   
}