<?php
header('Content-type: text/javascript; charset=utf-8');

?> 

<script> 
 $(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('.check_all').prop("checked", false); 
	check();
});
var i=$('table tr').length;

$(".addr").on('click',function(){
	count=$('table tr').length;
	
    var data="<tr><td><input type='checkbox' class='case'/></td>";
    data +="<td><input class='form-control' type='text' id='ph_code_"+i+"' style='width:50px' name='id_producto[]' readonly/></td><td><input class='form-control' type='text' id='nombre_"+i+"' name='producto[]' required/></td> <td><select class='form-control' id='coun_no_"+i+"' name='country_no[]' ><option>Lb</option><option>Onz</option><option>Kg</option><option>Lata</option><option>Botella</option><option>Unidad</option></select></td><td><input class='form-control' type='text' id='cantidad_"+i+"' name='cantidad[]' required/></td></tr>";
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
