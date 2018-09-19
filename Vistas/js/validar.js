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
    var pais = $('#pais').val();
    var departamento = $('#departamento').val();
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
        id_valido = "";
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
                
            }
        });
        }else{
            email_valido = "";
            $('#emai').css("border-color", "yellow");
        }
    }else{
        email_valido = "";
        $('#emai').css("border-color", "#ced4da");
    }
    validar_final();
    function validar_final(){
        if (id_valido!="" && nacimiento!="" && pais!="0" && departamento!="0" &&tipo_documento!="tipo de documento" &&genero!="Seleccione su genero" && ciudad!="0" && email_valido!="" && name!="" && lastname!="" && tel!="" && cel!="" && dir!="" && pass!="") {
            $("#boton_enviar_registro").removeAttr('disabled');
        }else{
            $("#boton_enviar_registro").attr('disabled', 'disabled');
        }
    }
}
var codigo_valido="";
function validar_producto(){
    var nombre = $('#nombre_añadirpro_administrador').val();
    var precio_venta = $('#precio_venta_añadirpro_administrador').val();
    var precio_compra = $('#precio_compra_añadirpro_administrador').val();
    var categoria = $('#cat').val();
    var proveedor = $('#prov').val();
    var cantidad = $('#cantidad_añadirpro_administrador').val();
    var file = $('#file_añadirpro_administrador').val();
    var descripcion = $('#descripcion_añadirpro_administrador').val();

    var codigo = $('#code_añadirpro_administrador').val();
    var dato_codigo = "producto";
    var indice = "Start";
    var campo = "idproducto";
    if(codigo!="" && codigo!=" "){
        $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: codigo, dato: dato_codigo, campo: campo} ).done( function(respuesta)
        {
            if(respuesta=="true"){
                codigo_valido = "";
                $('#code_añadirpro_administrador').css("border-color", "red");
                validar_final_producto();
            }else{
                codigo_valido = "si";
                $('#code_añadirpro_administrador').css("border-color", "green");
                validar_final_producto();
            }
        });
    }else{
        codigo_valido = "";
        $('#code_añadirpro_administrador').css("border-color", "#ced4da");
    }
    validar_final_producto();
    function validar_final_producto(){
        if (codigo_valido!="" && categoria!="Seleccione Categoría" && cantidad!="" && file!="" && descripcion!="" && proveedor!="Seleccione el Proveedor" && nombre!="" && precio_compra!="" && precio_venta!="") {
            $("#boton_añadirproducto_administrador").removeAttr('disabled');
        }else{
            $("#boton_añadirproducto_administrador").attr('disabled', 'disabled');
        }
    }
}
var id_valido_cliente = "";
var email_valido_cliente = ""; 
function validar_cliente(){
    validar_final();
    var name = $('#name').val();
    var lastname = $('#last-name').val();
    var cel = $('#cel').val();
    var dir = $('#dir').val();
    var pass = $('#pass').val();
    var ciudad = $('#ciudad').val();
    var pais = $('#pais').val();
    var departamento = $('#departamento').val();
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
                id_valido_cliente = "";
                $('#id').css("border-color", "red");
                validar_final();
            }else{
                id_valido_cliente = "si";
                $('#id').css("border-color", "green");
                validar_final();
            }
        });
    }else{
        $('#id').css("border-color", "#ced4da");
        id_valido_cliente = "";
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
                    email_valido_cliente = "";
                $('#emai').css("border-color", "red");
                validar_final();
            }else{
                email_valido_cliente = "si";
                $('#emai').css("border-color", "green");
                validar_final();
                
            }
        });
        }else{
            email_valido_cliente = "";
            $('#emai').css("border-color", "yellow");
        }
    }else{
        email_valido_cliente = "";
        $('#emai').css("border-color", "#ced4da");
    }
    validar_final();
    function validar_final(){
        if (id_valido_cliente!="" && nacimiento!="" && pais!="0" && departamento!="0" &&tipo_documento!="tipo de documento" &&genero!="Seleccione su genero" && ciudad!="0" && email_valido_cliente!="" && name!="" && lastname!="" && cel!="" && dir!="" && pass!="") {
            $("#boton_enviar_registro").removeAttr('disabled');
        }else{
            $("#boton_enviar_registro").attr('disabled', 'disabled');
        }
    }
}


var id_valido_proveedor= "";
var email_valido_proveedor = ""; 
function validar_proveedor(){
    validar_final();
    var name = $('#name').val();
    var lastname = $('#last-name').val();
    var cel = $('#cel').val();
    var dir = $('#dir').val();
    var ciudad = $('#ciudad').val();
    var pais = $('#pais').val();
    var departamento = $('#departamento').val();
    var razon_social = $('#razonsocial').val();
    var id = $('#id').val();
    var dato_id = "identidad";
    var indice = "Start";
    var campo = "numero_identidad";
    if(id!="" && id!=" "){
        $.post( 'Modelo/Process/modelo_validar.php',{ indice: indice ,requerido: id, dato: dato_id, campo: campo} ).done( function(respuesta)
        {
            if(respuesta=="true"){
                id_valido_proveedor = "";
                $('#id').css("border-color", "red");
                validar_final();
            }else{
                id_valido_proveedor = "si";
                $('#id').css("border-color", "green");
                validar_final();
            }
        });
    }else{
        $('#id').css("border-color", "#ced4da");
        id_valido_proveedor = "";
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
                    email_valido_proveedor = "";
                $('#emai').css("border-color", "red");
                validar_final();
            }else{
                email_valido_proveedor = "si";
                $('#emai').css("border-color", "green");
                validar_final();
                
            }
        });
        }else{
            email_valido_proveedor = "";
            $('#emai').css("border-color", "yellow");
        }
    }else{
        email_valido_proveedor = "";
        $('#emai').css("border-color", "#ced4da");
    }
    validar_final();
    function validar_final(){
        if (id_valido_proveedor!="" && razon_social!="" && pais!="0" && departamento!="0" && ciudad!="0" && email_valido_proveedor!="" && name!="" && lastname!="" && cel!="" && dir!="") {
            $("#boton_enviar_registro").removeAttr('disabled');
        }else{
            $("#boton_enviar_registro").attr('disabled', 'disabled');
        }
    }
}