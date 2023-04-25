<div class="adicionales">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" id="formulario">
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="text" name="user"class="form-control" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input type="password" name="password"class="form-control" placeholder="Contraseña" required>
            </div>
            <div id="resp"  align="center"></div>
            <div class="text-center"><a href="#" class="olvido-contrasena">¿Haz olvidado tu contraseña?</a></div> </br>
            <div align=center><a id="btn-ingresar" style="color:#ffffff;" class="btn btn-primary">Ingresar</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  
  $('#btn-ingresar').click(function(){
    console.log("entro");
      var url = "/page/login";
      $.ajax({                        
          type: "POST",                 
          url: url,                     
          data: $("#formulario").serialize(), 
          success: function(data)             
          {
          console.log(data);
            $('#resp').html(data.mensaje); 
            if(data.error == false){
            location.reload();
            }              
          }
      });
  });

</script>