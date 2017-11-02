<div class="page-header">
  <h1>Exercises <small>Options</small></h1>
</div>

<div class="container">
    <div class="col-lg-12">
        <form role="form" id="formulario" action="#RUTA_BASE#/ejercicios/start" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="numero">Número de preguntas máximas</label>
                <input type="text" class="form-control" id="inputNumero" name="inputNumero" placeholder="Escribe el numero de preguntas" required="true" number="true" min="5" max="50"/>
             </div>
            <div class="form-group">
               <label for="temario">Temario</label>
               <select multiple class="form-control" required="true" name="selectTemario[]">
                   <option value="0">Regular Verbs</option>
                   <option value="1">Irregular Verbs</option>
                   <option value="2">Phrasal Verbs</option>
                   <option value="3">Other Vocabulary</option>                        
               </select>
           </div>
           <button type="submit" class="btn">Start</button>
        </form>
    </div>
</div>
<script type = "text/javascript">
$(document).ready(function(){
   $("#formulario").validate();
});
</script>