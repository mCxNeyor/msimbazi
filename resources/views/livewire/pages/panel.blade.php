<div>
    @section('panel', 'active') 

    <div class="card" wire:poll.30ms>
        <div class="card-header"><h3>Latest data table</h3></div>
        <div class="card-body">
            <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <th>Unit id</th>
                                <th>pH</th>
                                <th>TDS</th>
                                <th>EC</th>
                                <th><sup>0</sup>C</th>
                                <th>TURBIDITY</th>
                                <th>LATITUDE</th>
                                <th>LONGITUDE</th>
                                <th>LOCATION</th>
                                <th>TIME</th>
                                
                                    @foreach ($devices as $device )
                                  <tr>  
                                 
                                    <td><a href="{{ route('all', ['id' => $device->id]) }}">{{ $device->imei }}</a></td>
                                    @if( $device->latestData )                            
                                        <td class="@if($device->latestData->ph == 7) table-success @else table-danger @endif">{{ $device->latestData ? $device->latestData->ph : 'No data available'}}
                                            @if($device->latestData->ph == 7.0 )
                                            <sub>neutral</sub>
                                             @elseif ($device->latestData->ph<7.0 ) 
                                             <sub>Acidic</sub>
                                             @elseif($device->latestData->ph > 8 && $device->latestData->ph < 14)
                                             <sub>Alkaline</sub>
                                             @endif
                                        </td>
                                    <td>{{ $device->latestData ? $device->latestData->tds : 'No data available'}}</td>
                                    <td>{{ $device->latestData ? $device->latestData->ec : 'No data available'}}</td>
                                    <td>{{ $device->latestData ? $device->latestData->temp : 'No data available'}}</td>
                                    <td>{{ $device->latestData ? $device->latestData->tur : 'No data available'}} </td>
                                    <td>{{ $device->latestData ? $device->latestData->longi : 'No data available'}}</td>
                                    <td>{{ $device->latestData ? $device->latestData->lati : 'No data available'}}</td>
                                    <td> <a href="">{{ $device ? $device->location : 'No data available'}}</a> </td>
                                    <td class="table-secondary">
                                        {{ $device->latestData ? Carbon\Carbon::parse($device->latestData->created_at)->format('H:i:s') : '-' }}
                                    </td>                                    
                                    @else
                                  <td>-</td>  
                                  <td>-</td>  <td>-</td>  <td>-</td>  <td>-</td>  <td>-</td>  <td>-</td>  <td>-</td> <td>-</td>   
                                    @endif
                                </tr>
                                @endforeach
                              </table>
            </div>
               
        </div>
    </div>

<br>
    
</div>
