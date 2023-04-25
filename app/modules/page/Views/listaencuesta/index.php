<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Encuestas</h2></div>
</div>
<div class="caja-encuestas" style="margin-top: 50px;margin-bottom: 284px;">
    <div class="container">
        <ul>
            <?php foreach ($this->encuestas as $key => $encuesta) { ?>
                <li><a href="/page/encuesta?id=<?php echo $encuesta->encuesta_id ?>"><?php echo $encuesta->encuesta_nombre ?></a></li>          
            <?php } ?>
        </ul>
    </div>
</div> 