<?php
$title = 'Mes spots';

$ObjSpot = new Spots;
$spots = $ObjSpot->getSpots();

ob_start();
require_once(__DIR__.'/header.php');?>

<main class="container mx-auto-5">
    <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl">Mes spots de plongée</h2>
    <div id="map" class="bg-gray-200 mx-auto"> <!-- div de la map -->
        <script>
            var map = L.map('map').setView([42.476496, 3.120023], 13); // centre de la carte d'origine

            // tuile definissant l'affichage de la carte
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
            
                // marqueurs
                <?php foreach ($spots as $spot) : ?>

                var marker = L.marker([<?php echo ($spot['latitude'].','.$spot['longitude']); ?>]).addTo(map);
                marker.bindPopup("<h1> <?php echo $spot['spot_name']; ?> </h1><p>longitude : <?php echo( $spot['longitude']); ?> </p><p> latitude : <?php echo ($spot['latitude']); ?> </p>");
                
                <?php endforeach; ?>
        </script>
    </div> 
</main>

<?php $content = ob_get_clean();

require_once('layout.php');