var id_valido = "";
var email_valido = ""; 
function validar(){
    validar_final();
    var name = $('#name').val();
    var lastname = $('#last-name').val();
    var tel = $('#tel').val();
    var cel = $('#cel').val();
    var dir = $('#dir').val();
    var pass = $('#pass').val();
    var tipo_usuario = $('#ad').val();
    var ciudad = $('#ciudad').val();
    var genero = $('#genero').val();
    var tipo_documento = $('#identificacion').val();
    var nacimiento = $('#nacimiento').val();
    console.log(nacimiento);
    var id = $('#id').val();
    var dato_id = "identidad";
    var indice = "Start";
    var campo = "numero_identidad";
    if(id!=""){
        $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: id, dato: dato_id, campo: campo} ).done( function(respuesta)
        {
            if(respuesta=="true"){
                id_valido = "";
                $('#id').css("border-color", "red");
                validar_final();
            }else{
                id_valido = "si";
                $('#id').css("border-color", "green");
                validar_final();
            }
        });
    }
    var email = $('#emai').val();
    var dato_email = "usuario";
    var indice = "Start";
    var campo = "email_usuario";
    if(email!=""){
        $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: email, dato: dato_email, campo: campo} ).done( function(respuesta)
        {
            if(respuesta=="true"){
                email_valido = "";
                $('#emai').css("border-color", "red");
                validar_final();
            }else{
                email_valido = "si";
                $('#emai').css("border-color", "green");
                validar_final();
            }
        });
    }
    validar_final();
    function validar_final(){
        if (id_valido!="" && nacimiento!="" &&tipo_documento!="tipo de documento" &&genero!="Seleccione su genero" && ciudad!="0" &&tipo_usuario!="Escoja Usuario" && email_valido!="" && name!="" && lastname!="" && tel!="" && cel!="" && dir!="" && pass!="") {
            $("#boton_enviar_registro").removeAttr('disabled');
        }else{
            $("#boton_enviar_registro").attr('disabled', 'disabled');
        }
    }
}