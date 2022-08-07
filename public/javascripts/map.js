let map;
function init() {
    let overlay = new OpenLayers.Layer.Vector('Overlay', {
        styleMap: new OpenLayers.StyleMap({
            externalGraphic: '../images/marker.png',
            graphicWidth: 20, graphicHeight: 24, graphicYOffset: -24,
            title: '${tooltip}'
        })
    });
    let myLocation = new OpenLayers.Geometry.Point(10.2, 48.9)
        .transform('EPSG:4326', 'EPSG:3857');
    overlay.addFeatures([
        new OpenLayers.Feature.Vector(myLocation, {tooltip: 'OpenLayers'})
    ]);
    let popup = new OpenLayers.Popup.FramedCloud("Popup",
        myLocation.getBounds().getCenterLonLat(), null,
        '<a target="_blank" href="https://openlayers.org/">We</a> ' +
        'could be here.<br>Or elsewhere.', null,
        true
    );
    map = new OpenLayers.Map({
        div: "map", projection: "EPSG:3857",
        layers: [new OpenLayers.Layer.OSM(), overlay],
        center: myLocation.getBounds().getCenterLonLat(), zoom: 15
    });
    map.addPopup(popup);
}