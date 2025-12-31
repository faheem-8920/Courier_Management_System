<!DOCTYPE html>
<html>
<head>
    <title>Riders Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 600px; width: 100%; margin: 20px 0; }
    </style>
</head>
<body>
<h2>Riders Live Location</h2>
<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    let map = L.map('map').setView([30.3753, 69.3451], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let markers = {};

    function loadRiders() {
        fetch("{{ route('riders.locations') }}")
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    let rider = item.rider;
                    if (!rider) return;

                    if (markers[rider.id]) {
                        markers[rider.id].setLatLng([item.latitude, item.longitude]);
                    } else {
                        markers[rider.id] = L.marker([item.latitude, item.longitude])
                            .addTo(map)
                            .bindPopup(rider.name);
                    }
                });
            });
    }

    setInterval(loadRiders, 5000);
    loadRiders();
</script>
</body>
</html>
