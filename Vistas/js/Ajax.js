$(document).ready(function () {
    $("#pais").on("change", function () {
        let idPais = $(this).val();
        let url = "Modelo/Functions/Ajax.php";
        if (idPais) {
            $.ajax({
                type: "POST",
                url: url,
                data: "idPais="+idPais,
                success: function (response) {
                    // console.log(response);
                    $("#depto").html(response);
                    $("#ciudad").html('<option value="">Seleccione primero Departamento </option>');
                }
            });
        }else{
            $("#depto").html('<option value="">Seleccione País primero</option>');
            $("#ciudad").html('<option value="">Seleccione primero Departamento</option>');
        }
    });
    $("#depto").on("change", function () {
        let idDepto = $(this).val();
        let url = "Modelo/Functions/Ajax.php";
        if (idDepto) {
            $.ajax({
                type: "POST",
                url: url,
                data: "idDepto="+idDepto,
                success: function (response) {
                    $("#ciudad").html(response);
                }
            });
        }else{
            $("#ciudad").html('<option value="">Seleccione primero Departamento</option>');
        }
    });
    /* =================================
        MODIFICACIÓN CLIENTE FULL FIELDS 
       ================================= */
    $(".cliente").click(function () {
        let val = $(this).val();
        let url = "Modelo/Functions/Ajax.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "id="+val,
            // contentType = false,
            dataType: "json",
            success: function (response) {
                if (response) {
                    
                    $("[name=id]").attr("value", response['numero_identidad']);
                    $("[name=contacto]").attr("value", response['telefono']);
                    $("[name=nombre]").attr("value", response['nombre_persona']);
                    $("[name=apellido]").attr("value", response['apellido_persona']);
                    $("[name=email]").attr("value", response['email_usuario']);
                    $("[name=date]").attr("value", response['fecha_nacimiento']);
                    $("[name=dir]").attr("value", response['direccion']);
                    if (response['genero'] == "M") {
                        $("[value=M]").prop('checked',true);
                    } else {
                        $("[value=F]").prop('checked',true);
                    }                                
                }
            }
        })
        .fail(function () {
            console.log("error");
        });
    });
    /* ===================================
        MODIFICACIÓN EMPLEADOS FULL FIELDS 
       =================================== */
    /* ===================================
        MODIFICACIÓN PRODUCTOS FULL FIELDS 
       =================================== */
    /* ===================================
        MODIFICACIÓN CATEGORIA FULL FIELDS 
       =================================== */
    /* =====================================
        MODIFICACIÓN PROVEEDORES FULL FIELDS 
       ===================================== */
});