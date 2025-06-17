<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ Config("app.name") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet" >
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    	<style type="text/css">
        .excellent {
            background-color: #55BF3B; /* Green */
            color: white;
        }
        .good {
            background-color: #DDDF0D; /* Yellow */
            color: black;
        }
        .fair {
            background-color: #FFCC00; /* Light Yellow-Orange */
            color: black;
        }
        .poor {
            background-color: #FF8C00; /* Orange */
            color: white;
        }
        .very-poor {
            background-color: #DF5353; /* Red */
            color: white;
        }
        .unsafe {
            background-color: #C03C3C; /* Dark Red */
            color: white;
        }
       #map { height: 700px; padding-left: 10px; padding-right: 10px}
        .highcharts-figure .chart-container {
            width: 300px;
            height: 200px;
            float: left;
        }
        
        .highcharts-figure,
        .highcharts-data-table table {
            width: 100%;
            margin: 0 auto;
        }
        
        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        
        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }
        
        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
        
        @media (max-width: 600px) {
            .highcharts-figure,
            .highcharts-data-table table {
                width: 100%;
            }
        
            .highcharts-figure .chart-container {
                width: 500px;
                float: none;
                margin: 0 auto;
            }
        }
        
            </style>
    @livewireStyles()
    </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand @yield("home") text-dark" href="{{ route('home') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @yield("gauge")" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link @yield("panel")" href="{{ route('panel') }}">Panel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield("about")" aria-current="page" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Setting
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Add device</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Remove unit</a></li>
              <li><hr class="dropdown-divider"></li>
            </ul>
          </li>
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>
<div>
  <div class="container py-3">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      {{$slot}}
  </div>

 <livewire:pages.add-device-modal/>
  
</div>

  
</body>
@livewireScripts()
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/Highcharts-11.2.0/code/highcharts.js') }}"></script>
<script src="{{ asset('assets/Highcharts-11.2.0/code/highcharts-more.js') }}"></script>
<script src="{{ asset('assets/Highcharts-11.2.0/code/modules/solid-gauge.js') }}"></script>
<script src="{{ asset('assets/Highcharts-11.2.0/code/modules/exporting.js') }}"></script>
<script src="{{ asset('assets/Highcharts-11.2.0/code/modules/export-data.js') }}"></script>
<script src="{{ asset('assets/Highcharts-11.2.0/code/modules/accessibility.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
<!-- Add jQuery CDN if not included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    {{-- <script>
            var map = L.map('map').setView([-6.811058,39.264770 ], 20);
            // -6.811058, 39.264770

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([-6.811058,39.264770 ]).addTo(map)
                .bindPopup('A')
                .openPopup();
    </script> --}}


    <script>
        // Initialize the map
        var map = L.map('map').setView([-6.811058, 39.264770], 18); // Default center on map

        // Add OpenStreetMap tile layer
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Store markers by IMEI so that we can update them later
        var deviceMarkers = {};

        // Function to determine the color of the marker based on turbidity
        function getMarkerColor(turbidity) {
            if (turbidity <= 5) {
                return '#55BF3B';  // Green (Excellent)
            } else if (turbidity <= 20) {
                return '#DDDF0D';  // Yellow (Good)
            } else if (turbidity <= 50) {
                return '#FFCC00';  // Orange (Fair)
            } else if (turbidity <= 100) {
                return '#FF8C00';  // Dark Orange (Poor)
            } else if (turbidity <= 500) {
                return '#DF5353';  // Red (Very Poor)
            } else {
                return '#C03C3C';  // Dark Red (Unsafe)
            }
        }

        // Function to update markers on the map based on IMEI and device data
        function updateMaps() {
            $.ajax({
                url: "https://mto-msimbazi.koyeb.app/api/data",  // Replace with your actual API URL
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    response.forEach(device => {
                        var deviceIMEI = device.imei;
                        var deviceLocation = device.location;
                        // Get the turbidity value to determine marker color
                        var turbidity = device.latest_data.tur;

                        // Determine the color of the marker based on turbidity
                        var markerColor = getMarkerColor(turbidity);

                        // If the marker for this device already exists, update it
                        if (deviceMarkers[deviceIMEI]) {
                            var marker = deviceMarkers[deviceIMEI];
                            marker.setLatLng([device.latest_data.lati, device.latest_data.longi])
                                  .setIcon(L.icon({ // Change the marker icon color dynamically
                                      iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png', 
                                      iconSize: [25, 41],
                                      iconAnchor: [12, 41],
                                      popupAnchor: [1, -34],
                                      shadowAnchor: [10, 12],
                                      shadowSize: [41, 41],
                                      className: `marker-color-${markerColor}`
                                  }))
                                  .bindPopup(`<strong>Location:</strong> ${deviceLocation}  <hr>  <br>IMEI: ${deviceIMEI}<br>Turbidity: ${turbidity} NTU<br>EC: ${device.latest_data.ec} µS/cm<br>pH: ${device.latest_data.ph} <br>TDS:${device.latest_data.tds}<br>Temperature:${device.latest_data.temp}<sup>o</sup>C`);
                        } else {
                            // If marker does not exist, create a new marker and add it to the map
                            var newMarker = L.marker([device.latest_data.lati, device.latest_data.longi], {
                                icon: L.icon({
                                    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowAnchor: [10, 12],
                                    shadowSize: [41, 41],
                                    className: `marker-color-${markerColor}` // Apply dynamic color class
                                })
                            }).addTo(map)
                            .bindPopup(`<strong>Location:</strong> ${deviceLocation}  <hr>  <br>IMEI: ${deviceIMEI}<br>Turbidity: ${turbidity} NTU<br>EC: ${device.latest_data.ec} µS/cm<br>pH: ${device.latest_data.ph} <br>TDS:${device.latest_data.tds}<br>Temperature:${device.latest_data.temp}<sup>o</sup>C<br>Time:${new Date(device.latest_data.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}`)
                            .openPopup();

                            // Store the new marker using IMEI as key
                            deviceMarkers[deviceIMEI] = newMarker;
                        }
                    });
                },
                error: function(error) {
                    console.error("Error updating data", error);
                }
            });
        }

        // Call updateMaps every 1 second to keep the map and markers up to date
        setInterval(updateMaps, 1000);
    </script>

<script>
                        $(document).ready(function () {
                fetchAndRenderCharts(); // Initial call to fetch and render charts
            });

            let deviceCharts = {};

            function fetchAndRenderCharts() {
                $.ajax({
                    url: "https://mto-msimbazi.koyeb.app/api/data",
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (Array.isArray(response)) {
                            response.forEach(device => {
                                createCharts(device);
                            });
                        } else {
                            console.error("Data is not an array", response);
                        }
                    },
                    error: function (error) {
                        console.error("Error fetching data", error);
                    }
                });
            }

            function createCharts(device) {
                const gaugeOptions = {
                    chart: {
                        type: 'solidgauge'
                    },
                    title: null,
                    pane: {
                        center: ['50%', '85%'],
                        size: '140%',
                        startAngle: -90,
                        endAngle: 90,
                        background: {
                            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                            innerRadius: '60%',
                            outerRadius: '100%',
                            shape: 'arc'
                        }
                    },
                    exporting: { enabled: false },
                    tooltip: { enabled: false },
                    yAxis: {
                        stops: [
                            [0.1, '#55BF3B'], // green
                            [0.5, '#DDDF0D'], // yellow
                            [0.9, '#DF5353']  // red
                        ],
                        lineWidth: 0,
                        tickWidth: 0,
                        minorTickInterval: null,
                        tickAmount: 2,
                        title: { y: -70 },
                        labels: { y: 16 }
                    },
                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                y: 5,
                                borderWidth: 0,
                                useHTML: true
                            }
                        }
                    }
                };

                let turbidityChart = Highcharts.chart(`container-speed-${device.id}`, Highcharts.merge(gaugeOptions, {
                    title: { text: `Turbidity - ${device.imei}` },
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: { text: 'NTU' },
                        plotBands: [
                            { from: 0, to: 1, color: '#55BF3B' }, // Excellent
                            { from: 1, to: 5, color: '#DDDF0D' }, // Good
                            { from: 5, to: 10, color: '#FFCC00' }, // Fair
                            { from: 10, to: 25, color: '#FF8C00' }, // Poor
                            { from: 25, to: 50, color: '#DF5353' }, // Very Poor
                            { from: 50, to: 100, color: '#C03C3C' } // Unsafe
                        ]
                    },
                    series: [{ data: [device.latest_data.tur] }]
                }));

                let tdsChart = Highcharts.chart(`container-tds-${device.id}`, Highcharts.merge(gaugeOptions, {
                            title: { text: `TDS - ${device.imei}` },
                            yAxis: {
                                min: 0,
                                max: 1500,  // TDS typically ranges up to 1500 mg/L, but this can vary depending on the source
                                title: { text: 'mg/L' },
                                plotBands: [
                                    { from: 0, to: 300, color: '#55BF3B' }, // Excellent (0-300 mg/L)
                                    { from: 300, to: 600, color: '#DDDF0D' }, // Good (300-600 mg/L)
                                    { from: 600, to: 900, color: '#FFCC00' }, // Fair (600-900 mg/L)
                                    { from: 900, to: 1200, color: '#FF8C00' }, // Poor (900-1200 mg/L)
                                    { from: 1200, to: 1500, color: '#DF5353' }, // Very Poor (1200-1500 mg/L)
                                    { from: 1500, to: 1500, color: '#C03C3C' } // Unsafe (>1500 mg/L)
                                ]
                            },
                            series: [{
                                data: [device.latest_data.tds]
                            }]
                        }));

               
                        let ecChart = Highcharts.chart(`container-ec-${device.id}`, Highcharts.merge(gaugeOptions, {
                    title: { text: `EC - ${device.imei}` },
                    yAxis: { min: 0, max: 3000, title: { text: 'µS/m' } },
                    series: [{ data: [device.latest_data.ec] }]
                }));

                let phChart = Highcharts.chart(`container-ph-${device.id}`, {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null
                    },
                    title: { text: `pH - ${device.imei}` },
                    yAxis: {
                        min: 0,
                        max: 14,
                        tickPixelInterval: 1,
                        labels: { distance: 20 },
                        plotBands: [
                                        { from: 6.5, to: 8.5, color: '#55BF3B' },  // Green - Excellent/Good pH range
                                        { from: 8.5, to: 11.5, color: '#55C1F3' }, // Light Blue - Alkaline - Fair pH range
                                        { from: 11.5, to: 12.5, color: '#00A9E5' }, // Blue - Alkaline - Poor pH range
                                        { from: 12.5, to: 14, color: '#004F99' }, // Dark Blue - Alkaline - Unsafe pH range
                                        { from: 5.5, to: 6.5, color: '#DDDF0D' },  // Yellow - Fair pH range
                                        { from: 4.5, to: 5.5, color: '#FF8C00' },  // Orange - Poor pH range
                                        { from: 3.0, to: 4.5, color: '#DF5353' },  // Red - Very Poor pH range
                                        { from: 1.0, to: 3.0, color: '#C03C3C' }   // Dark Red - Unsafe pH range
                                    ]

                    },
                    series: [{ data: [device.latest_data.ph] }]
                });

                let tempChart=Highcharts.chart(`container-temp-${device.id}`, {
                                    chart: {
                                        type: 'gauge',
                                        alignTicks: false,
                                        plotBackgroundColor: null,
                                        plotBackgroundImage: null,
                                        plotBorderWidth: 0,
                                        plotShadow: false
                                    },

                                    title: {
                                        text: `Temperature - ${device.imei}`
                                    },

                                    pane: {
                                        size: '120%',
                                        startAngle: -150,
                                        endAngle: 150
                                    },

                                    yAxis: {
                                                min: 0,
                                                max: 200,
                                                tickPosition: 'outside',
                                                lineColor: '#933',
                                                lineWidth: 2,
                                                minorTickPosition: 'outside',
                                                tickColor: '#933',
                                                minorTickColor: '#933',
                                                tickLength: 5,
                                                minorTickLength: 5,
                                                labels: {
                                                    distance: 12,
                                                    rotation: 'auto'
                                                },
                                                offset: -20,
                                                endOnTick: false
                                            },
                    series: [{ 
                        
                        data: [device.latest_data.temp],
                            dataLabels: {
                                            format: '<span style="color:#339">{y} °C</span><br/>',
                                            backgroundColor: {
                                                linearGradient: {
                                                    x1: 0,
                                                    y1: 0,
                                                    x2: 0,
                                                    y2: 1
                                                },
                                                stops: [
                                                    [0, '#DDD'],
                                                    [1, '#FFF']
                                                ]
                                            }
                                         },
                                tooltip: {
                                    valueSuffix: '°C'
        } }]
                                });

                deviceCharts[device.id] = { turbidityChart, ecChart, phChart,tempChart,tdsChart };
            }

            function updateCharts() {
                $.ajax({
                    url: "https://mto-msimbazi.koyeb.app/api/data",
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        response.forEach(device => {
                            if (deviceCharts[device.id]) {
                                deviceCharts[device.id].turbidityChart.series[0].setData([device.latest_data.tur]);
                                deviceCharts[device.id].ecChart.series[0].setData([device.latest_data.ec]);
                                deviceCharts[device.id].phChart.series[0].setData([device.latest_data.ph]);
                            }
                        });
                    },
                    error: function (error) {
                        console.error("Error updating data", error);
                    }
                });
            }

            setInterval(updateCharts, 1000);

</script>

</html>