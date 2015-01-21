<!DOCTYPE html>
<?php


?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulario de registro de Grupos de Procesos</title>
        <link rel="stylesheet" type="text/css" href="../../recursos/css/forms.css"/>
        <link rel="stylesheet" type="text/css" href="../../recursos/css/formsSearch.css"/>
    </head>
    <body>

        <div id="stylized" class="myform">
            <form id="form" name="formInsert" method="post" action="_proxy.php">
                <h1>Formulario de registro de Grupos de Procesos</h1>
                <p>Por favor complete los campos que se requiere </p>
                
                <?php foreach($grupo as $gr ) {?>
                <label>Nombre
                    <span class="small"></span>
                </label>
                <input type="text" name="nombre" id="nombre" required="required" value="<?php echo $gr->getNombre() ?>" />
                <div class="spacer"></div>
                <label>Descripción
                    <span class="small">Coloque una descripción</span>
                </label>
                <textarea name="descripcion" id="descripcion" required="required" rows="5" cols="40"><?php echo $gr->getDescripcion() ?></textarea>
                <div class="spacer"></div>
                <label>Peso
                    <span class="small">Coloque el peso en %</span>
                </label>
                <input type="text" name="peso" id="peso" onblur="validarPeso();" required="required"  value="<?php echo $gr->getPeso() ?>"/>
                <label id="mensaje">

                </label>
                <div class="spacer"></div>
                                
               
                <label>Estado
                    <span class="small">Seleccione un estado</span>
                </label>
                <select name="estado" id="estado">
                    <option value="1" <?php if($gr->getEstado()=="1") echo 'selected="selected"'; ?> >Activo </option>
                    <option value="0" <?php if($gr->getEstado()=="0") echo 'selected="selected"'; ?> >Desactivo</option>
                </select>                              
                <div class="spacer"></div> 
                

                <div class="spacer"></div>
                <input type="hidden" name="controlador" id="controlador" value="Grupo"/>
                <input type="hidden" name="accion" id="accion" value="actualizaGrupo"/>
                <input type="hidden" name="grupoid" id="grupoid" value="<?php echo $gr->getGrupo_id() ?>"/>
                <button  id="enviars"  disabled type="submit">Guardar</button>
                <!--<button type="submit">Guardar</button>-->
                <?php }?>
            </form>
        </div>
        <script>

            function validarPeso() {

                $.ajax({
                    url: "_proxy.php",
                    type: "GET",
                    data: "controlador=Grupo&accion=validarGrupoPesoEdit&peso=" + $("#peso").val()+"&grupoid="+$("#grupoid").val(),
                    success: function(r) {
                        $("#mensaje").html(r);
                        dato = $("#correct").val();

                        if (dato == 1) {
                            $("#enviars").removeAttr("disabled");
                        }
                        if (dato == 0) {
                            $("#enviars").attr("disabled", "disabled");
                        }
                    }
                });
            }
        </script>
    </body>
</html>