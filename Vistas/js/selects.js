$(function(){
	
	$.post( 'Modelo/Process/modelo_selects.php' ).done( function(respuesta)
	{
		$( '#pais' ).html( respuesta );
	});
	$('#pais').change(function()
	{
		$( '#ciudad' ).html('<option value="0">Seleccione su ciudad</option>');
        var indice = $(this).val();
        var requerido = "departamento";
        var contencion= "pais";
		$.post( 'Modelo/Process/modelo_selects.php', { indice: indice ,requerido: requerido, contencion: contencion}).done( function( respuesta )
		{
			$( '#departamento' ).html( respuesta );
		});
    });
	$( '#departamento' ).change( function()
	{
		var indice = $(this).val();
        var requerido = "ciudad";
        var contencion= "departamento";
		$.post( 'Modelo/Process/modelo_selects.php', { indice: indice ,requerido: requerido, contencion: contencion}).done( function( respuesta )
		{
			$( '#ciudad' ).html( respuesta );
		});
	});
})