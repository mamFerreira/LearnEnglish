<div class="page-header">
  <h1>Irregular Verbs <small>Add</small></h1>
</div>
<div class="row marketing">
    <div class="col-lg-12">
        <form role="form" id="formulario" action="grabar/VerboRegular" enctype="multipart/form-data" method="post">
            <div class="form-group col-lg-3">
                <label for="english">Infinitive</label>
                <input type="text" class="form-control" id="infinitive" name="infinitive" placeholder="Introduce el infinitivo" maxlength="128" required>
            </div>
            <div class="form-group col-lg-3">
                <label for="english">Past Simple</label>
                <input type="text" class="form-control" id="past_simple" name="past_simple" placeholder="Introduce el pasado simple" maxlength="128" required>
            </div>
            <div class="form-group col-lg-3">
                <label for="english">Past Participle</label>
                <input type="text" class="form-control" id="past_participle" name="past_participle" placeholder="Introduce el pasado participio" maxlength="128" required>
            </div>
            <div class="form-group col-lg-3">
                <label for="descripcion">Translation</label>
                <input type="text" class="form-control" id="translation" name="translation" placeholder="Introduce el verbo traducido" maxlength= "128" required>
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