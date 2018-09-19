function eliminar_dif_numero(comp){
    var id = comp.id;
    $('#'+id).keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
}
function eliminar_dif_texto(comp){
    var id = comp.id;
    $('#'+id).keyup(function (){
        this.value = this.value.replace(/[^ a-záéíóúüñ]+/ig,"");
    });
}
function eliminar_dif_correo(comp){
    var id = comp.id;
    $('#'+id).keyup(function (){
        this.value = this.value.replace(/ /ig,"");
    });
}