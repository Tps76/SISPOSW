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
    $(".empleado").click(function () {
        let val = $(this).val();
        let url = "Modelo/Functions/Ajax.php";
        $.ajax({
                type: "POST",
                url: url,
                data: "idemp=" + val,
                // contentType = false,
                dataType: "json",
                success: function (response) {
                    if (response) {
                        // console.log(response);
                        
                        $("[name=id]").attr("value", response['numero_identidad']);
                        $("[name=contacto]").attr("value", response['telefono']);
                        $("[name=nombre]").attr("value", response['nombre_persona']);
                        $("[name=apellido]").attr("value", response['apellido_persona']);
                        $("[name=email]").attr("value", response['email_usuario']);
                        $("[name=date]").attr("value", response['fecha_nacimiento']);
                        $("[name=dir]").attr("value", response['direccion']);
                        if (response['nombre_catusuario'] == "admin") {
                            $("#cargo option[value='1']").prop('selected', true);
                        }
                        if (response['genero'] == "M") {
                            $("[value=M]").prop('checked', true);
                        } else {
                            $("[value=F]").prop('checked', true);
                        }

                    }
                }
            })
            .fail(function () {
                console.log("error");
            });
    });
    /* ===================================
        MODIFICACIÓN PRODUCTOS FULL FIELDS 
       =================================== */
    $(".producto").click(function () {
        let val = $(this).val();
        let url = "Modelo/Functions/Ajax.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "idprod=" + val,
            // contentType = false,
            dataType: "json",
            success: function (response) {
                console.log(val);
                if (response) {
                    console.log(response);
                
                    $("[name=code]").attr("value", response['idproducto']);
                    $("[name=name]").attr("value", response['nombre_producto']);
                    $("[name=priceSale]").attr("value", response['venta_producto']);
                    $("[name=priceBuy]").attr("value", response['compra_producto']);
                    $("[name=cant]").attr("value", response['cantidad_stock']);
                    $("#prov option:contains("+response['razon_social']+")").prop("selected", true);
                    $("#cat option:contains(" + response['nombre_categoria'] + ")").prop("selected", true);
                    $("[name=img]").load(response['imagen_producto']);
                    if (response['nombre_catusuario'] == "admin") {
                        $("#cargo option[value='1']").prop('selected', true);
                    }else{
                        $("#cargo option[value='2']").prop('selected', true);
                    }
                    if (response['genero'] == "M") {
                        $("[value=M]").prop('checked', true);
                    } else {
                        $("[value=F]").prop('checked', true);
                    }
                }
            }
        })
        .fail(function () {
            console.log("error");
        });
    });
    /* =====================================
        MODIFICACIÓN PROVEEDORES FULL FIELDS 
       ===================================== */
});