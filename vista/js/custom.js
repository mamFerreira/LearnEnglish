function edit_row($id){
        alert($id);
}
    
function delete_row(id,tipo){

    var ruta = "";
    
    switch(tipo) {
    case 1:
        ruta = "VerboRegular/borrar/"+id;
        break;
    case 2:
        ruta = "VerboIrregular/borrar/"+id;
        break;
    case 3:
        ruta = "VerboCompuesto/borrar/"+id;
        break;
    case 4:
        ruta = "OtroVocabulario/borrar/"+id;
        break;
    default:
        return;
}

    BootstrapDialog.confirm('¿Está seguro que desea eliminar el elemento?', function(result){

        if(result) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (parseInt(this.responseText) > 0 ){                            
                        BootstrapDialog.alert("Elemento eliminado correctamente");
                        $("#fila"+id).remove();
                    }else{
                        BootstrapDialog.alert("Error al eliminar elemento");
                    }

                }
            };
            xmlhttp.open("GET",ruta,true);
            xmlhttp.send();
        }        
    });
}