$(function(){
	$.post( '../Modelo/modelo_selects.php' ).done( function(respuesta)
	{
		$( '#pais' ).html( respuesta );
	});
	$('#pais').change(function()
	{
        var indice = $(this).val();
        var requerido = "departamento";
        var contencion= "pais";
		$.post( '../Modelo/modelo_selects.php', { indice: indice ,requerido: requerido, contencion: contencion}).done( function( respuesta )
		{
			$( '#departamento' ).html( respuesta );
		});
    });
	$( '#departamento' ).change( function()
	{
		var indice = $(this).val();
        var requerido = "ciudad";
        var contencion= "departamento";
		$.post( '../Modelo/modelo_selects.php', { indice: indice ,requerido: requerido, contencion: contencion}).done( function( respuesta )
		{
			$( '#ciudad' ).html( respuesta );
		});
	});
})