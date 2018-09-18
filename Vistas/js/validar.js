$(function(){
	$('#id').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#tel').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#cel').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#id').change(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#tel').change(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#cel').change(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $('#emai').keyup(function (){
        this.value = (this.value + '').replace(/ /, '');
    });
    $('#emai').change(function (){
        this.value = (this.value + '').replace(/ /, '');
    });
})
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
    var ciudad = $('#ciudad').val();
    var genero = $('#genero').val();
    var tipo_documento = $('#identificacion').val();
    var nacimiento = $('#nacimiento').val();
    var id = $('#id').val();
    var dato_id = "identidad";
    var indice = "Start";
    var campo = "numero_identidad";
    if(id!="" && id!=" "){
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
    }else{
        $('#id').css("border-color", "#ced4da");
    }
    var email = $('#emai').val();
    var dato_email = "usuario";
    var indice = "Start";
    var campo = "email_usuario"; 
    if(email!="" && email!=" "){
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (regex.test(email.trim())) {
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
                console.log();
                
            }
        });
        }else{
            $('#emai').css("border-color", "yellow");
        }
    }else{
        $('#emai').css("border-color", "#ced4da");
    }
    validar_final();
    function validar_final(){
        if (id_valido!="" && nacimiento!="" &&tipo_documento!="tipo de documento" &&genero!="Seleccione su genero" && ciudad!="0" && email_valido!="" && name!="" && lastname!="" && tel!="" && cel!="" && dir!="" && pass!="") {
            $("#boton_enviar_registro").removeAttr('disabled');
        }else{
            $("#boton_enviar_registro").attr('disabled', 'disabled');
        }
    }
}