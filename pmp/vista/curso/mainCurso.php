<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

?>
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MVC - Modelo, Vista, Controlador</title>
            
        <script type="text/javascript" src="../../recursos/js/jquery.js"></script>
        <script type="text/javascript" src="../../recursos/ajax/curso.js"></script>
        <link rel="stylesheet" type="text/css" href="../../recursos/css/formsSearch.css"/>
        <link rel="stylesheet" type="text/css" href="../../recursos/css/listas.css"/>          
        
</head>
<body>

    <div class="myformBusqueda" id="stylizedBusqueda">
               
        <form id="form" name="form" method="get" action="_proxy.php">
            <h1>Registro y Administracion de Área de Conocimientos</h1>  
            <p> </p>
            <label for="busqueda">Nombre Área
                <span class="small"></span>
            </label>
            <input type="search" name="datos" id="datos" results="5"/>
            <input type="hidden" name="controlador" id="controlador" value="Curso"/>
            <input type="hidden" name="accion" id="accion" value="formBuscarCurso"/>
            <button type="submit">Buscar</button>
            <div class="spacer" style="text-align: match-parent;">
                <button type="button" onclick="javascript:showFormCurso()">Nuevo</button>
                <button type="button" onclick="location.href='_proxy.php?controlador=Curso&accion=listarTwoU'">Listar</button>   
            </div>
        </form>
    </div>    
    
    
    
    <table id="table" class="formTable" width="100%">
	<tr>
		
                <th>#</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Opciones</th>

        </tr>
	<?php
        $i=0;
	foreach($curso as $item )
	{
	?>
	<tr>
		<td><?php  echo ++$i;?></td>
		<td><?php  echo $item->getCurso_id() ?></td>
		<td><?php  echo $item->getNombre() ?></td>
                <td><?php  echo $item->getEstado() ?></td>
		<td>  
                
                        <button type="button" class="editar" onclick="javascript:showFormEditCurso(<?php echo $item->getCurso_id()?>)">Editar</button>
                        <button type="button" class="eliminar"  onclick="location.href='_proxy.php?controlador=Curso&accion=eliminar&cursoid=<?php echo $item->getCurso_id()?>'" >Eliminar</button>
                        
                </td>
		
           
	</tr>
	<?php
	}
	?>
</table>
</body>
</html>