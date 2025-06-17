<div>
    <div>
        @section('panel', 'active') 
    
        <div class="card" wire:poll.30ms>
            <div class="card-header"><h3>All data from Device {{ $name->imei }} installed at {{ $name->location }}</h3></div>
            <div class="card-body">
                <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                 
                                    <th>pH</th>
                                    <th>TDS</th>
                                    <th>EC</th>
                                    <th><sup>0</sup>C</th>
                                    <th>TURBIDITY</th>
                                    <th>LATITUDE</th>
                                    <th>LONGITUDE</th>
                                    <th>LOCATION</th>
                                    <th>Time</th>
                                    
                                        @foreach ($devices as $device )
                                      <tr>  
                                     
                                        
                                        @if( $device )                            
                                            <td class="@if($device->ph == 7) table-success @else table-danger @endif">{{ $device ? $device->ph : 'No data available'}}
                                                @if($device->ph == 7.0 )
                                                <sub>neutral</sub>
                                                 @elseif ($device->ph<7.0 ) 
                                                 <sub>Acidic</sub>
                                                 @elseif($device->ph > 8 && $device->ph < 14)
                                                 <sub>Alkaline</sub>
                                                 @endif
                                            </td>
                                        <td>{{ $device ? $device->tds : 'No data available'}}</td>
                                        <td>{{ $device ? $device->ec : 'No data available'}}</td>
                                        <td>{{ $device ? $device->temp : 'No data available'}}</td>
                                        <td>{{ $device ? $device->tur : 'No data available'}} </td>
                                        <td>{{ $device ? $device->longi : 'No data available'}}</td>
                                        <td>{{ $device ? $device->lati : 'No data available'}}</td>
                                        <td> <a href="">{{ $device ? $device->location : 'No data available'}}</a> </td>
                                        <td class="table-secondary">
                                            {{ $device ? Carbon\Carbon::parse($device->created_at)->format('H:i:s') : '-' }}
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
    
</div>
