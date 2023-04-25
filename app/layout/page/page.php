<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= $this->_titlepage ?></title>
    <link rel="stylesheet" type="text/css" href="/scripts/carousel/carousel.css">
    <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/skins/page/css/global.css?v=1.04">
    <link rel="shortcut icon" href="/favicon.ico">
    <script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
    <script src="https://www.youtube.com/player_api"></script>
    <script src="/components/jquery/dist/jquery.min.js"></script>
    <script src="/scripts/popper.min.js"></script>
    <script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/scripts/carousel/carousel.js"></script>
    <script src="/skins/page/js/main.js?v=1.02"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500&display=swap" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”description” content=”<?= $this->_data['meta_description']; ?>” />
    <meta name=”keywords” content=”<?= $this->_data['meta_keywords']; ?>” />
    <?php echo $this->_data['scripts'];  ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=&sensor=true"></script>
    <script type="text/javascript">
        var map;
        var longitude = 0;
        var latitude = 0;
        var icon = '/skins/administracion/images/ubicacion.png';
        var point = false;
        var zoom = 10;

        function setValuesMap(longitud, latitud, punto, zoomm, icono) {
            longitude = longitud;
            latitude = latitud;
            if (punto) {
                point = punto;
            }
            if (zoomm) {
                zoom = zoomm;
            }
            if (icono) {
                icon = icono
            }
        }

        function initializeMap() {
            var mapOptions = {
                zoom: parseInt(zoom),
                center: new google.maps.LatLng(longitude, longitude),
            };
            // Place a draggable marker on the map
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            if (point == true) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(longitude, latitude),
                    map: map,
                    icon: icon
                });
            }
            map.setCenter(new google.maps.LatLng(longitude, latitude));
        }
    </script>
</head>

<body>
    <header>
        <?= $this->_data['header']; ?>
    </header>
    <div class="contenedor-general"><?= $this->_content ?></div>
    <footer>
        <?= $this->_data['footer']; ?>
    </footer>
    <?= $this->_data['adicionales']; ?>
</body>

</html>