<div class="page-header">
  <h1>Exercises</h1>
</div>
<div class="row marketing">
    <div class="col-lg-12"> 
        <form role="form" id="formulario" action="#RUTA_BASE#/ejercicios/end" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="false">
            #BLOQUE#
        <button id="corregir" type="submit">Corregir</button>
        </form>        
    </div>    
</div>

<script type = "text/javascript">
$(document).ready(function(){
   $("#formulario").validate();
});
</script>