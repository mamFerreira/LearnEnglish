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
  <h1>Phrasal Verbs <small>List</small></h1>
</div>
<table class="table table-striped table-bordered" id="listadoVerbosCompuestos">
    <thead>
        <tr>
            <th>Verb</th>
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
        $('#listadoVerbosCompuestos').DataTable();
    } );
</script>