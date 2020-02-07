<div class="modal" 
    id="deleteModalDialog" 
    tabindex="-1" 
    role="dialog" 
    aria-hidden="true"
    style = "z-index: 90000">
    
    <div class="modal-dialog modal-dialog-centered" role="document" >

        <div class="modal-content">
        
            <div class="modal-header bg-warning pt-2 text-light">

                <h5 class="modal-title text-dark">Delete Item</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <div class="modal-body">
                <p>You are about to delete:</p>
                <p id='dialog-body' class='h5 text-dark'>
                    
                </p>
            </div>


            <div class="modal-footer">

                <form action="" 
                    method="POST" 
                    id="deleteForm" >

                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger" id='submitBtn'>
                        <i class="fas fa-trash"></i>
                        Delete Item
                    </button>
                </form>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>  
</div>
