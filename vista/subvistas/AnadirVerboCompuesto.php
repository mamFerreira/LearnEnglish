<div class="page-header">
  <h1>Phrasal Verbs <small>Add</small></h1>
</div>
<div class="row marketing">
    <div class="col-lg-12">
        <form role="form" id="formulario" action="grabar/VerboCompuesto" enctype="multipart/form-data" method="post">
            <div class="form-group col-lg-6">
                <label for="english">Verb</label>
                <input type="text" class="form-control" id="verb" name="verb" placeholder="Introduce el phrasal verb" maxlength="128" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="descripcion">Translation</label>
                <input type="text" class="form-control" id="translation" name="translation" placeholder="Introduce el phrasal verb traducido" maxlength= "128" required>
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