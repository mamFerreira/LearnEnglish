<script>
    function edit_row($id){
        alert($id);
    }
    
    function delete_row(id){
        
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
                xmlhttp.open("GET","OtroVocabulario/borrar/"+id,true);
                xmlhttp.send();
            }        
        });
    }
    
</script>


<div class="page-header">
  <h1>Other Vocabulary <small>List</small></h1>
</div>
<table class="table table-striped table-bordered" id="listadoOtroVocabulario">
    <thead>
        <tr>
            <th>English</th>
            <th>Tipo</th>
            <th>Translation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        #BLOQUE#
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#listadoOtroVocabulario').DataTable();
    } );
</script>