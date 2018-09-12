function validar(){
    var id = $('#id').val();
    var id_valido = "";
    var dato_id = "identidad";
    var indice = "Start";
    var campo = "numero_identidad";
    $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: id, dato: dato_id, campo: campo} ).done( function(respuesta)
	{
		if(respuesta=="true"){
           $('#id').css("border-color", "red");
           id_valido = "";
        }else{
           $('#id').css("border-color", "green");
           id_valido = "si";
        }
    });
    console.log(id_valido);

    var name = $('#name').val();
    var lastname = $('#last-name').val();
    var tel = $('#tel').val();
    var cel = $('#cel').val();

    var email = $('#emai').val();
    var email_valido = "";
    var dato_email = "usuario";
    var indice = "Start";
    var campo = "email_usuario";
    $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: email, dato: dato_email, campo: campo} ).done( function(respuesta)
	{
        console.log(respuesta);
		if(respuesta=="true"){
           $('#emai').css("border-color", "red");
           email_valido = "";
        }else{
           $('#emai').css("border-color", "green");
           email_valido = "si";
        }
	});

    console.log(email_valido);
    var dir = $('#dir').val();
    var pass = $('#pass').val(); 
    if (id_valido!="" && name!="" && lastname!="" && tel!="" && cel!="" && email_valido!="" && dir!="" && pass!="") {
        // document.getElementById("boton_enviar_registro").removeAttribute('disabled');
        $("#boton_enviar_registro").removeAttr('disabled');
    }else{
        $("#boton_enviar_registro").attr('disabled', 'disabled');
        // document.getElementById("boton_enviar_registro").setAttribute('disabled' , 'diabled');
    }
}