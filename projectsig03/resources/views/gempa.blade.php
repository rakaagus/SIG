<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 800px;
        }
    </style>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>

    <h1 style="text-align: center">Data Gempa terkini</h1>
    <p style="text-align: center">Data by : BMKG</p>

    <div id="map"></div>
    <script>
        let map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let datas = {!! file_get_contents('https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json') !!};
        console.log(datas);

        let gempa = datas.Infogempa.gempa;

        gempa.forEach(dataGempa => {
            let coordinate = dataGempa.Coordinates.split(',');
            let lat = coordinate[0];
            let long = coordinate[1];
            const marker = L.circle([lat, long], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 40000
            }).addTo(map);

            marker.bindPopup(
                `Tanggal: ${dataGempa.Tanggal}` + '</br>' +
                `Jam: ${dataGempa.Jam}` + '</br>' +
                `Magnitudo ${dataGempa.Magnitude}` + '</br>' +
                `Wilayah: ${dataGempa.Wilayah}` + '</br>' +
                `Potensi Status: ${dataGempa.Potensi}`
            );
        });
    </script>
</body>

</html>
