
function Add(){
	if (jQuery('#easy_option_numOps').val() == "") 
		jQuery('#easy_option_numOps').val(1);
	else
		jQuery('#easy_option_numOps').val(parseInt(jQuery('#easy_option_numOps').val())+parseInt(1));
	var num = jQuery('#easy_option_numOps').val();
	jQuery("#table1 tbody").append(
		"<tr>"+
		    '<td><input type="text" name="easy_option_table[name_'+num+']" value="" /></td>'+
	        '<td>'+
	        	'<select name="easy_option_table[type_'+num+']">'+
	        		'<option value="text">Text</option>'+
	        		'<option value="image">Image</option>'+
	        	'</select>'+
	        '</td>'+
	        '<td><input type="text" name="easy_option_table[id_'+num+']" value="" /></td>'+
			'<td><input class="btnDelete" type="button" value="Delete Option" /></td>'+
		"</tr>");
	jQuery(".btnDelete").bind("click", Delete);
}; 

function Delete(){
	var par = jQuery(this).parent().parent(); //tr
	par.remove();
	jQuery('#easy_option_numOps').val(jQuery('#table1 tbody').children().length);
}; 

jQuery(document).ready(function(jQuery) {
	jQuery(".btnDelete").bind("click", Delete); 
	jQuery("#btnAdd").bind("click", Add); 
});
