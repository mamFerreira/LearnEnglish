<div class="page-header">
  <h1>Other Vocabulary <small>Add</small></h1>
</div>
<div class="row marketing">
    <div class="col-lg-12">
        <form role="form" id="formulario" action="grabar/OtroVocabulario" enctype="multipart/form-data" method="post">
            <div class="form-group col-lg-4">
                <label for="english">Tipo</label>
                <select id="type" name="type" class="form-control required">
                    <option value="" selected disabled="">Seleccione el tipo de palabra...</option>
                    #BLOQUE0#
                </select>
            </div>
            <div class="form-group col-lg-4">
                <label for="english">English</label>
                <input type="text" class="form-control" id="english" name="english" placeholder="Introduce la palabra en inglés" maxlength="128" required>
            </div>            
            <div class="form-group col-lg-4">
                <label for="descripcion">Translation</label>
                <input type="text" class="form-control" id="translation" name="translation" placeholder="Introduce su traducción correspondiente" maxlength= "128" required>
            </div>            
            <button type="submit" class="btn center-block">Save</button>
        </form>
    </div>
</div>
<script type = "text/javascript">
$(document).ready(function(){
   $("#formulario").validate();
});
</script>