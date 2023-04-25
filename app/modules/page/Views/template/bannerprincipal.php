<div class="slider-principal">
    <div id="carouselprincipal<?php echo $this->seccionbanner;  ?>" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($this->banners as $key => $banner) { ?>
                <li data-target="#carouselprincipal<?php echo $this->seccionbanner;  ?>" data-slide-to="0" <?php if (
                                                                                                                $key == 0
                                                                                                            ) { ?>class="active" <?php }  ?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($this->banners as $key => $banner) { ?>
                <div class="carousel-item <?php if ($key == 0) { ?>active <?php } ?>">
                    <a href="<?php echo $banner->publicidad_enlace; ?>" target="<?php echo $banner->publicidad_tipo_enlace==='1' ? '_blank' : ''; ?>">
                        <?php if ($this->id_youtube($banner->publicidad_video) != false) { ?>
                            <div class="fondo-video-youtube">
                                <div class="banner-video-youtube" id="videobanner<?php echo $banner->publicidad_id; ?> " data-video="<?php echo $this->id_youtube($banner->publicidad_video); ?>"></div>
                            </div>
                        <?php } else { ?>
                            <div class="fondo-imagen" style="background-image: url(/images/<?php echo $banner->publicidad_imagen; ?>);"></div>
                            <div class="fondo-imagen-responsive" style="background-image: url(/images/<?php echo $banner->publicidad_imagenresponsive; ?>);"></div>
                        <?php } ?>
                    </a>
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselprincipal<?php echo $this->seccionbanner;  ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"> <i class="fas fa-angle-double-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselprincipal<?php echo $this->seccionbanner;  ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

