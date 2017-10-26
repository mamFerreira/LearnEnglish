<div class="page-header">
  <h1>Regular Verbs <small>Add</small></h1>
</div>
<div class="row marketing">
    <div class="col-lg-12">
        <form role="form" id="formulario" action="grabar/VerboRegular" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="english">English Verb</label>
                <input type="text" class="form-control" id="english" name="english" placeholder="Introduce el verbo en inglés" minlength="2" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Spanish Verb</label>
                <input type="text" class="form-control" id="spanish" name="spanish" placeholder="Introduce el verbo correspondiente en español" minLength= "2" required>
            </div>            
            <button type="submit" class="btn btn-default">Save</button>
        </form>
    </div>
</div>
<script type = "text/javascript">
$(document).ready(function(){
   $("#formulario").validate();
});
</script>