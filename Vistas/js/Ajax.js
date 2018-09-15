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
});