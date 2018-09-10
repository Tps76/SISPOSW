function validar(){
    var id = $('#id').val();
    var dato_id = "identidad";
    var indice = "Start"
    $.post( '../Modelo/modelo_validar.php',{ indice: indice ,requerido: id, dato: dato_id} ).done( function(respuesta)
	{
        console.log(respuesta);
		if(respuesta=="true"){
           $('#id').css("border-color", "red");
        }else{
           $('#id').css("border-color", "green");
        }
	});
    var name = $('#name').val();
    var lastname = $('#last-name').val();
    var tel = $('#tel').val();
    var cel = $('#cel').val();
    var email = $('#email').val();
    var dir = $('#dir').val();
    var user = $('#user').val();
    var pass = $('#pass').val(); 
    if (id!="" && name!="" && lastname!="" && tel!="" && cel!="" && email!="" && dir!="" && user!="" && pass!="") {
        document.getElementById("boton_enviar_registro").removeAttribute('disabled');
    }else{
        document.getElementById("boton_enviar_registro").setAttribute('disabled' , 'diabled');
    }
}