$(function(){
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
        
    $("#login").popover({
        html: true,
        content: function () {
            return $('#popover-content').html();
        }
    });
    $('body').on('click', function (e) {
        $('#login').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
    // $('#regModal').on('shown.bs.modal', function () {
    //     $('#myInput').trigger('focus')
    // });
    $(".click").click(function () { 
        // valores obtenidos
        let val = $(this).val();
        let id = $(this).attr("id");
        let email = $(this).attr("name");
        // console.log("valor persona = "+id);
        // console.log("valor boton = "+val);
        console.log(id);
        
         
        $("#prueba").html('<input type=hidden value="'+val+'" name="id" >');
        $("#edit").html('<input type=hidden value="'+val+'" name="edit" >');
        $("#stock").html('<input type=hidden value="' + id + '" name="stock" >');
        $("#person").html('<input type=hidden value="'+id+'" name="person" >');
        $("#user").html('<input type=hidden value="'+email+'" name="user" >');
        $("#delete").html('<input type=hidden value="'+val+'" name=delete >');
        
    });
    
});