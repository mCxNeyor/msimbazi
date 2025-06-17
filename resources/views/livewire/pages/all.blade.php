<div>
    @section('panel', 'active')
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>All data from Device {{ $name->imei }} installed at {{ $name->location }}</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    View Options
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" id="showAll">Show All Columns</a></li>
                    <li><a class="dropdown-item" href="#" id="showBasic">Basic View</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" id="exportCSV">Export as CSV</a></li>
                </ul>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="deviceDataTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="basic-col">pH</th>
                            <th class="basic-col">TDS</th>
                            <th class="basic-col">EC</th>
                            <th class="basic-col"><sup>o</sup>C</th>
                            <th class="extra-col">TURBIDITY</th>
                            <th class="extra-col">LATITUDE</th>
                            <th class="extra-col">LONGITUDE</th>
                            <th class="basic-col">Date</th>
                            <th class="basic-col">Time</th>
                            <th class="actions-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($devices as $device)
                        <tr>
                            <td class="basic-col @if($device->ph == 7) table-success @else table-danger @endif">
                                {{ $device->ph }}
                                @if($device->ph == 7.0)
                                    <sub>neutral</sub>
                                @elseif ($device->ph < 7.0)
                                    <sub>Acidic</sub>
                                @elseif($device->ph > 8 && $device->ph < 14)
                                    <sub>Alkaline</sub>
                                @endif
                            </td>
                            <td class="basic-col">{{ $device->tds }}</td>
                            <td class="basic-col">{{ $device->ec }}</td>
                            <td class="basic-col">{{ $device->temp }}</td>
                            <td class="extra-col">{{ $device->tur }}</td>
                            <td class="extra-col">{{ $device->longi }}</td>
                            <td class="extra-col">{{ $device->lati }}</td>
                            <td class="basic-col">
                                {{ Carbon\Carbon::parse($device->created_at)->format('Y-m-d') }}
                            </td>
                            <td class="basic-col">
                                {{ Carbon\Carbon::parse($device->created_at)->format('H:i:s') }}
                            </td>
                            <td class="actions-col">
                                <button class="btn btn-sm btn-outline-primary view-details" data-id="{{ $device->id }}">
                                    <i class="bi bi-eye"></i> Details
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Details - now inside the single root div -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detailed Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                    <!-- Content will be loaded here via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .extra-col {
            display: none;
        }
    </style>

    @push('scripts')
    <script>
        // View toggle functionality
        document.getElementById('showAll').addEventListener('click', function(e) {
            document.querySelectorAll('.extra-col').forEach(col => {
                col.style.display = 'table-cell';
            });
        });

        document.getElementById('showBasic').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.extra-col').forEach(col => {
                col.style.display = 'none';
            });
        });

        // CSV Export
        document.getElementById('exportCSV').addEventListener('click', function(e) {
            e.preventDefault();
            let csv = [];
            let headers = [];
            
            // Get headers
            document.querySelectorAll('thead th').forEach(th => {
                if(th.style.display !== 'none') {
                    headers.push(th.innerText.replace(/\n/g, '').trim());
                }
            });
            csv.push(headers.join(','));
            
            // Get rows
            document.querySelectorAll('tbody tr').forEach(tr => {
                let row = [];
                tr.querySelectorAll('td').forEach((td, index) => {
                    if(td.style.display !== 'none') {
                        row.push(td.innerText.replace(/\n/g, '').trim());
                    }
                });
                csv.push(row.join(','));
            });
            
            // Download
            let csvContent = csv.join('\n');
            let blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            let url = URL.createObjectURL(blob);
            let link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'device_data.csv');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Details modal
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function() {
                let deviceId = this.getAttribute('data-id');
                fetch(`/device/${deviceId}/details`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('modalBodyContent').innerHTML = data;
                        new bootstrap.Modal(document.getElementById('detailsModal')).show();
                    });
            });
        });
    </script>
    @endpush
</div>