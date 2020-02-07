<div class="modal" 
    id="modal-dialog" 
    tabindex="-1" 
    role="dialog" 
    aria-hidden="true"
    style = "z-index: 90000">
    
    <div class="modal-dialog modal-dialog-centered" role="document" >

        <div class="modal-content">
        
            <div class="modal-header bg-success pt-2 text-light">

                <h5 class="modal-title text-dark">
                    {{ $title ?? '' }}
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <div class="modal-body h5 text-dark">
                {{ $slot }}
            </div>


            <div class="modal-footer">

                <div class="form-group row">
                {{ $footer }}
                  
                  
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>  
</div>
