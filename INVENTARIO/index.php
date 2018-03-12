<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="jquery autocomplete">
	<meta name="keywords" content="jquery autocomplete">
	<meta name="author" content="muni">
    <title>Compras LP </title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link href="css/menu_section.css" rel="stylesheet">
	<link href="css/irvns.css" rel="stylesheet">
	<link href="css/ir.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.printPage.js" type="text/javascript"></script>
	<script type = "text/javascript" language = "javascript">
    $(document).ready(function() {
        $("#EnviarData").one( "click", function() {
	var index = $( "#InventarioE" ).index( this );
  $( this ).css({
    borderStyle: "inset",
    cursor: "auto"
  });
            $.post( 
                "send_data.php",
                $("#students").serialize(),
								
                  function(data) {
					  console.log(data)
					  $('#stage1').html(data);
                  });
               var str = $("#testform").serialize();
               $("#stage2").text(str);
            });	
			$("#SendData").one( "click", function() {
	var index = $( "#InventarioE" ).index( this );
  $( this ).css({
    borderStyle: "inset",
    cursor: "auto"
  });
            $.post( 
                "envio_inventario.php",
                $("#students2").serialize(),
								
                  function(data) {
					  console.log(data)
					  $('#stage2').html(data);
                  });
               var str = $("#testform").serialize();
               $("#stage2").text(str);
            });
			var n = 0;
$( "#InventarioE" ).one( "click", function() {
	var index = $( "#InventarioE" ).index( this );
  $( this ).css({
    borderStyle: "inset",
    cursor: "auto"
  });
            $.post( 
                "agregar_inventario.php",
                $("#students3").serialize(),
								
                  function(data) {
					  console.log(data)
					  $('#stage1').html(data);
                  });
               var str = $("#testform").serialize();
               $("#stage2").text(str);
            });

			$("#btnImpi").click(function(event){
			
					
			});
		 $("#btnImpi").printPage();
					
         });
		 
      </script>
	
 	</head>
 	<body>
<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pre-visualizacion Inventario</h4>
        </div>
        <div class="modal-body">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Productos Enviado fecha: <?php echo date('Y-m-d');?></h4>
        </div>
        <div class="modal-body">
		<?php
			date_default_timezone_set   ('America/El_Salvador');
			require_once 'config.php';
			$fecha = date('Y-m-d');
			$tabla = '';
						$query = "SELECT t2.id_ingrediente,nombre,t1.unidad,cantidad,t4.unidad as nombre_unidad from historial_inventario t1 left join ingredientes t2 on t1.id_ingrediente=t2.ID_ingrediente left join productos t3 on t2.id_producto=t3.id_producto left join unidad_medida t4 on t1.unidad=t4.id_unidad where date(fechahora_elaborado)='$fecha' ";
						$result = mysqli_query($con, $query);
						$tabla .= '<table class="table table-bordered"><th>Producto</th><th>Cantidad Enviada</th>';
						while ($row = mysqli_fetch_assoc($result)) {
						$tabla .= '<tr><td>'.$row['nombre'].' '.$row['nombre_unidad'].'</td><td>'.$row['cantidad'].'</td>';
						  
			 }
					$tabla .= '</tr></table>';
						echo $tabla;
		  ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
    <!-- Static navbar -->
	    		
			
	<!-- Static navbar -->
	
	    		<input id="tab1" type="radio" name="tabs" style="display: none;" checked>
                <label for="tab1">Ingreso Producto</label>
    
                 <input id="tab2" type="radio" style="display: none;" name="tabs">
                 <label for="tab2">Produccion de Masa Pizza</label>
				  <input id="tab3" type="radio" style="display: none;" name="tabs">
                 <label for="tab3">Inventario Final Diario</label>
  
                 
  
                      <section id="content1">
					  <div id="background-wrap">
    <div class="x1">
        <div class="cloud"></div>
    </div>

    <div class="x2">
        <div class="cloud"></div>
    </div>

    <div class="x3">
        <div class="cloud"></div>
    </div>

    <div class="x4">
        <div class="cloud"></div>
    </div>

    <div class="x5">
        <div class="cloud"></div>
    </div>
</div>
</div>
                      <center><h1>Inventario Sucursal</h1><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ver Envios</button></center>
					  
				<br>
	        	
				<form id='students2'>
					<div class="table-responsive">
					  	<table class="table table-bordered" id="tabla2">
							<tr>
							    <th><input class='all_check' type='checkbox' onclick="select_all2()"/></th>
							    <th>Producto</th>
							    <th>Unidad</th>
							    <th>Cantidad</th>
							   
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<td><select class='form-control' id='producto' name='id_producto[]'><option>--Seleccione--</option> <?php
						require_once 'config.php';
						$query = "SELECT id_ingrediente,nombre from productos p inner join ingredientes using(ID_producto) order by nombre ";
						$result = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value='".$row['id_ingrediente']."'>".$row['nombre']."</option>";	
							}	
					  ?></select></td>
						    	<td><select class="form-control" type='text' id='coun_no_1' name='country_no[]'  >
									<option></option>
									<option value="1">Unidad</option>
									
									<option value="3">Unidad Masa</option>
									<option value="20">Porcion 7 Onz</option>
									<option value="4">Porcion 5 Onz</option>
									<option value="5">Porcion 4 Onz</option>
									<option value="13">Porcion 3 Onz</option>
									<option value="6">Porcion 2 Onz</option>
									<option value="7">Porcion 1 Onz</option>
									<option value="14">Porcion 1.5 Onz</option>
									<option value="8">Porcion 0.50 Onz</option>
									<option value="21">Porcion 0.70 Onz</option>
									<option value="15">Lascas</option>
									<option value="9">Libras</option>
									<option value="10">Kilogramo</option>
									<option value="11">Onzas</option>
									<option value="12">Porcion Mix CH/MO</option>
								</select></td>
						    	<td><input class="form-control" type='text' id='cantidad_1' name='cantidad[]'required/></td>
                                
						    
						  	</tr>
					  	</table>
					  	<button type="button" class='btn btn-danger deli'>- Borrar</button>
						<button type="button" class='btn btn-success addrow'>+ Agregar</button>
                        <input type="button" class="btn btn-info" id="SendData" value="Enviar Inventario">
					</div>
				</form>
				
			
                      </section>
                      
                      <section id="content2">
					  
                            <center><h1>Inventario Masa</h1></center>
				<div>
					
					</div>
	        	
				<form id='students'>
					<div class="table-responsive">
					  	<table class="table table-bordered" id="mia">
							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th># De Recetas Preparadas</th>
							    <th># De Masas Estiradas</th>
							    <th>Desperdicio</th>
								<th></th>
							   
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	
						   	 	<td><input class="form-control" type='text' id='countryname_1' name='recetas_preparadas[]' required/></td>
						    	<td><input class="form-control" type='text' id='masas' name='masas_estiradas[]' required/></td>
						    	<td><input class="form-control" type='text' id='cantidad_1' name='desperdicio[]' placeholder="Onz" required/></td>
								<td><input class="form-control" type='text' id='cantidad_1' name='cosas[]' value="onz" required readonly/></td>
                                <input class="form-control" type='hidden' id='phone_code_1' name='id_producto[]'/>
						    
						  	</tr>
							
					  	</table>
					  	<button type="button" class='btn btn-danger delete'>- Borrar</button>
						<button type="button" class='btn btn-success addmore'>+ Agregar</button>
                        <input type="button"class="btn btn-info" id="EnviarData" value="Enviar Masas">
						
					</div>
					
				</form>
				
                      </section>
					  <section id="content3" >
					  <div class="stars">
					  <div class="twinkling">
					<input id="tab1" type="radio" name="tabs" style="display: none;" checked>
                <label for="tab1">Ingreso Producto</label>
    
                 <input id="tab2" type="radio" style="display: none;" name="tabs">
                 <label for="tab2">Produccion de Masa Pizza</label>
				  <input id="tab3" type="radio" style="display: none;" name="tabs">
                 <label for="tab3">Inventario Final Diario</label>
					  
					  <center><h1>Inventario Final Diario Sucursal </h1>
				
								<button id="btnImpi" class="btn btn-warning btn-lg" href="INV/index.php">Impirmir Inventario</button>&nbsp&nbsp<a class="btn btn-info btn-lg" href="PRE/" >Pre-Visualizacion</a>

					  </center>
	        	<br>
				<form id='students3'  name='students'>
					<div class="table-responsive">
					<div>
					
					</div>
					  	<table class="table table-bordered" id="tabla3">
							<tr>
							    <th><input class='all_check' type='checkbox' onclick="select_all2()"/></th>
							    
							    <th>Producto</th>
							    <th>Unidad</th>
							    <th>Cantidad</th>
							   
							</tr>
							
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	
						   	 	<td><select class='form-control' id='producto' name='id_producto[]'><option>--Seleccione--</option> <?php
						require_once 'config.php';
						$query = "SELECT id_ingrediente,nombre from productos p inner join ingredientes using(ID_producto) order by nombre ";
						$result = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value='".$row['id_ingrediente']."'>".$row['nombre']."</option>";	
							}	
					  ?></select></td>
						    	<td><select class="form-control" type='text' id='coun_no_1' name='country_no[]'  >
									<option></option>
									<option value="1">Unidad</option>
									
									<option value="3">Unidad Masa</option>
									<option value="20">Porcion 7 Onz</option>
									<option value="4">Porcion 5 Onz</option>
									<option value="5">Porcion 4 Onz</option>
									<option value="13">Porcion 3 Onz</option>
									<option value="6">Porcion 2 Onz</option>
									<option value="7">Porcion 1 Onz</option>
									<option value="14">Porcion 1.5 Onz</option>
									<option value="8">Porcion 0.50 Onz</option>
									<option value="21">Porcion 0.70 Onz</option>
									<option value="15">Lascas</option>
									<option value="9">Libras</option>
									<option value="10">Kilogramo</option>
									<option value="11">Onzas</option>
									<option value="12">Porcion Mix CH/MO</option>
								</select></td>
						    	<td><input class="form-control" type='text' id='cantidad_1' name='cantidad[]'required/></td>
                                
						    
						  	</tr>
							
							
					  	</table>
					  	<button type="button" class='btn btn-danger delete'>- Borrar</button>
						<button type="button" class='btn btn-success addr'>+ Agregar</button>
                        <button type="button" id="InventarioE" class="btn btn-info" >Enviar </button>
					</div>
				</form>
					  
					  
					  </div>
					 
					 </div> 
					</div>
					
					  </section>
                     
			
<!-- /container -->
	
	<div class="clearfix">
	<div id="stage1"></div>
	</div>
	<div id="stage2"></div>
	</div>
	<!-- Footer -->
    
    <!-- /Footer -->
    

	<script type="text/javascript"> 
	
	$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('.check_all').prop("checked", false); 
	check();
});
var i=$('table tr').length;

$(".addrow").on('click',function(){
	count=$('table tr').length;
	
    var data="<tr><td><input type='checkbox' class='case'/></td>";
    data +="<td><select id='producto' class='form-control' name='id_producto[]'><option>--Seleccione--</option><?php $opcion1 = mysqli_query($con, $query); while ($row2 =mysqli_fetch_assoc($opcion1)) { echo "<option value='".$row2['id_ingrediente']."'>".$row2['nombre']."</option>";}	?> </select></td><td><select class='form-control' id='coun_no_"+i+"' name='country_no[]' ><option></option><option value='1'>Unidad</option><option value='3'>Unidad Masa</option><option value='20'>Porcion 7 Onz</option><option value='4'>Porcion 5 Onz</option><option value='5'>Porcion 4 Onz</option><option value='13'>Porcion 3 Onz</option><option value='6'>Porcion 2 Onz</option><option value='7'>Porcion 1 Onz</option><option value='14'>Porcion 1.5 Onz</option><option value='8'>Porcion 0.50 Onz</option><option value='21'>Porcion 0.70 Onz</option><option value='15'>Lascas</option><option value='9'>Libras</option><option value='10'>Kilogramo</option><option value='11'>Onzas</option><option value='12'>Porcion Mix CH/MO</option></select></td><td><input class='form-control' type='text' id='cantidad_"+i+"' name='cantidad[]' required/></td></tr>";
	$('#tabla2').append(data);
	row = i ;
	
  
	i++;
});
				
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function select_all2() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=all_check]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function check(){
	obj=$('table tr').find('span');
	$.each( obj, function( key, value ) {
		id=value.id;
		$('#'+id).html(key+1);
	});
}
	
	
	
	
	
	
	
 $(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('.check_all').prop("checked", false); 
	check();
});

 $(".deli").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('.check_all').prop("checked", false); 
	check();
});
var i=$('table tr').length;

$(".addr").on('click',function(){
	count=$('table tr').length;
	
    var data="<tr><td><input type='checkbox' class='case'/></td>";
    data +="<td><select id='producto' class='form-control' name='id_producto[]'><option>--Seleccione--</option><?php $opcion1 = mysqli_query($con, $query); while ($row2 =mysqli_fetch_assoc($opcion1)) { echo "<option value='".$row2['id_ingrediente']."'>".$row2['nombre']."</option>";}	?> </select></td><td><select class='form-control' id='coun_no_"+i+"' name='country_no[]' ><option></option><option value='1'>Unidad</option><option value='3'>Unidad Masa</option><option value='20'>Porcion 7 Onz</option><option value='4'>Porcion 5 Onz</option><option value='5'>Porcion 4 Onz</option><option value='13'>Porcion 3 Onz</option><option value='6'>Porcion 2 Onz</option><option value='7'>Porcion 1 Onz</option><option value='14'>Porcion 1.5 Onz</option><option value='8'>Porcion 0.50 Onz</option><option value='21'>Porcion 0.70 Onz</option><option value='15'>Lascas</option><option value='9'>Libras</option><option value='10'>Kilogramo</option><option value='11'>Onzas</option><option value='12'>Porcion Mix CH/MO</option></select></td><td><input class='form-control' type='text' id='cantidad_"+i+"' name='cantidad[]' required/></td></tr>";
	$('#tabla3').append(data);
	row = i ;
	
  
	i++;
});
				
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function select_all2() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=all_check]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function check(){
	obj=$('table tr').find('span');
	$.each( obj, function( key, value ) {
		id=value.id;
		$('#'+id).html(key+1);
	});
}
	</script>									

  </body>
</html>

