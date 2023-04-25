<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Confirmación</h2></div>
</div>
<div class="detalle-producto">
    <div class="container">
        <div align="center" class="alert alert-success"> Su solicitud se encuentra en proceso, gracias por publicar.</div>
        <div align="center"><h2>Datos del Asociado</h2></div>
        <div align="center"><?php echo $this->confirmacion->clasificados_nombreusuario ?></div>
        <div align="center"><?php echo $this->confirmacion->clasificados_documento ?></div>
        <div align="center"><?php echo $this->confirmacion->clasificados_correo ?></div>
        <div align="center"><?php echo $this->confirmacion->clasificados_telefono ?></div> </br>
        <div align="center"><h2>Clasificado</h2></div>
        <div align="center"><?php echo $this->confirmacion->clasificados_nombre ?></div>
        <div align="center" class="introduccion"> <?php echo $this->confirmacion->clasificados_descripcion ?> </div>
    </div>
</div>