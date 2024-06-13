@extends('layouts.template')

@section('styles')
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div id="map" style="width: 100vw; height: 100vh; margin: 0"></div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Map
        var map = L.map('map').setView([-7.8881, 110.3431], 11); // Center the map at the middle of Bantul

        // Basemaps
        var openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var googleSatellite = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            attribution: '&copy; <a href="https://www.google.com/maps">Google Maps</a>'
        });

        var esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var stadiaDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        // Add OpenStreetMap as default
        openStreetMap.addTo(map);

        // Base Maps
        var baseMaps = {
            "OpenStreetMap": openStreetMap,
            "Google Satellite": googleSatellite,
            "Esri World Imagery": esriWorldImagery,
            "Stadia Dark": stadiaDark
        };

        // Function to generate a random color
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Style for mouseover
        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }
        }

        // Reset style after mouseout
        function resetHighlight(e) {
            geoJsonLayer.resetStyle(e.target);
        }

        // GeoJSON layer
        var geoJsonLayer = L.geoJson(null, {
            style: function(feature) {
                return {
                    opacity: 1,
                    color: "black",
                    weight: 0.5,
                    fillOpacity: 0.7,
                    fillColor: getRandomColor(),
                };
            },
            onEachFeature: function(feature, layer) {
                var content = "Kecamatan: " + feature.properties.KECAMATAN;
                layer.on({
                    click: function(e) {
                        // Fungsi ketika objek diklik
                        layer.bindPopup(content).openPopup();
                    },
                    mouseover: function(e) {
                        highlightFeature(e); // Highlight the feature on mouseover
                        layer.bindPopup("Kecamatan " + feature.properties.KECAMATAN, {
                            sticky: false
                        }).openPopup();
                    },
                    mouseout: function(e) {
                        resetHighlight(e); // Reset the highlight on mouseout
                        map.closePopup(); // Menutup popup
                    },
                });
            }
        });

        // Load GeoJSON
        fetch('storage/geojson2/bantul2.geojson')
            .then(response => response.json())
            .then(data => {
                geoJsonLayer.addData(data);
                geoJsonLayer.addTo(map);
            })
            .catch(error => {
                console.error('Error loading the GeoJSON file:', error);
            });

        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function (feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";

                layer.on({
                    click: function (e) {
                        layer.bindPopup(popupContent).openPopup();
                    },
                    mouseover: function (e) {
                        layer.bindTooltip(feature.properties.kab_kota).openTooltip();
                    },
                });
            },
        });

        $.getJSON("{{ route('api.points')}}", function (data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function (feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";

                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });

        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function (feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });

        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // Overlay layers
        var overlayMaps = {
            "Administrasi": geoJsonLayer,
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon
        };

        // Layer control
        L.control.layers(baseMaps, overlayMaps).addTo(map);

        // Add scale control
        L.control.scale().addTo(map);
    </script>
@endsection
