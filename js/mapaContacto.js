window.onload = function () {

    let myLatLng = [42.251891, -8.691626],
    map = L.map('map').setView(myLatLng, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    var marker = L.marker(myLatLng).addTo(map);
    marker.bindPopup("Ubicación Protectora Teis").openPopup();
};