<div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-center mb-4 text-primary" id="staticBackdropLabel">Register a New Device</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-2 bg-light rounded shadow-lg">
                  
                  
                    <div class="mb-4">
                      <input type="text" class="form-control form-control-lg border-primary" wire:model="imei" id="imei" placeholder="Device IMEI">
                      @error('imei')
                      <div class="text-danger mt-2">{{ $message }}</div>
                  @enderror
                    </div>
                  
                    <div class="mb-4">
                      <input type="text" class="form-control form-control-lg border-primary" wire:model="location" id="location" placeholder="Location Name">
                      @error('location')
                      <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  
                    <div class="mb-4">
                      <input type="text" class="form-control form-control-lg border-primary" wire:model="latitude" id="latitude" placeholder="Latitude">
                      @error('latitude')
                      <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  
                    <div class="mb-4">
                      <input type="text" class="form-control form-control-lg border-primary" wire:model="longitude" id="longitude" placeholder="Longitude">
                      @error('longitude')
                      <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>

                  </form>
                  
                </div>
            <div class="modal-footer">                
              <button type="button" class="btn btn-secondary btn-lg w-25" data-bs-dismiss="modal">Cancel</button>
              <button  class="btn btn-primary btn-lg w-100" wire:click.prevent="store()">Register Device</button>
            </div>
          </div>
        </div>
      </div>
    
    
    </div>
