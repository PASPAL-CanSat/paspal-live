<!DOCTYPE html>
<html land="cs-cz">
<head>
    <title>PASPAL - LIVE</title>
    <script src="https://www.openlayers.org/api/OpenLayers.js"></script>
</head>
<body onload="init()">
<?php
function gps_zs(){
    echo(file_get_contents('gps_zs.txt', true));
}
function gps_zd() {
    echo(file_get_contents('gps_zd.txt', true));
}
?>
<div id="map" style="width: 100%; height: 400px;"></div>
<script>
    let map;
    function init() {
        let overlay = new OpenLayers.Layer.Vector('Overlay', {
            styleMap: new OpenLayers.StyleMap({
                externalGraphic: '../img/marker.png',
                graphicWidth: 32, graphicHeight: 32, graphicYOffset: -32,
                title: '${tooltip}'
            })
        });
        let myLocation = new OpenLayers.Geometry.Point(<?= gps_zs() ?>, <?= gps_zd() ?>)
            .transform('EPSG:4326', 'EPSG:3857');
        overlay.addFeatures([
            new OpenLayers.Feature.Vector(myLocation, {tooltip: 'StratoCan'})
        ]);
        map = new OpenLayers.Map({
            div: "map", projection: "EPSG:3857",
            layers: [new OpenLayers.Layer.OSM(), overlay],
            center: myLocation.getBounds().getCenterLonLat(), zoom: 14
        });
    }
</script>
</body>
</html>
