<div id="map" style="height:500px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>

<script>
let map, marker;

function initMap() {
    let lat = {{ $rider->LatestLocation->Latitude ?? 0 }};
    let lng = {{ $rider->LatestLocation->Longitude ?? 0 }};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: { lat, lng }
    });

    marker = new google.maps.Marker({
        position: { lat, lng },
        map: map
    });
}

function refreshLocation() {
    fetch('/rider/{{ $rider->id }}/latest-location')
        .then(res => res.json())
        .then(data => {
            if(data){
                let pos = {
                    lat: parseFloat(data.Latitude),
                    lng: parseFloat(data.Longitude)
                };
                marker.setPosition(pos);
                map.setCenter(pos);
            }
        });
}

initMap();
setInterval(refreshLocation, 5000);
</script>
