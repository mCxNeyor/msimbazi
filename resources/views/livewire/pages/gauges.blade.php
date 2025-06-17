<div>
    @section('gauge', 'active') 

    {{-- @foreach ($devices as $device)
        <figure class="highcharts-figure">
            <div id="container-speed {{ $device->id }}" class="chart-container"></div>
            <div id="container-rpm {{ $device->id }}" class="chart-container"></div>
        </figure>
    @endforeach --}}
    {{-- <figure class="highcharts-figure" id="chart-container"></figure> --}}

    {{-- <figure class="highcharts-figure">
        @foreach ($devices as $device)
            <div class="chart-wrapper">
                <h3>Device: {{ $device->name }}</h3>
                <div id="container-speed-{{ $device->id }}" class="chart-container"></div>
                <div id="container-ec-{{ $device->id }}" class="chart-container"></div>
            </div>
        @endforeach
    </figure> --}}
    <figure class="highcharts-figure">
        @foreach ($devices as $device)
            <div class="row">
                <div class="col">
                   
                    <div ><h3>Device: <strong>{{ $device->imei }}</strong> - {{ $device->location }}</h3> </div>               
                    <hr>
                    <div id="container-ph-{{ $device->id }}" class="chart-container py-2 "></div>
                    <div id="container-tds-{{ $device->id }}" class="chart-container py-2 "></div>
                    <div id="container-speed-{{ $device->id }}" class="chart-container py-2"></div>
                    <div id="container-ec-{{ $device->id }}" class="chart-container py-2"></div>
                    <div id="container-temp-{{ $device->id }}" class="chart-container py-2"></div>
                </div>
                
                     <hr style="height:10px; color:black">
                     <hr>
                     
            </div>
        @endforeach
    </figure>
</div>
