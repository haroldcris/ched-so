<div class="modal fade " 
    tabindex="-1" 
    role="dialog" 
    id="searchModal"  
    aria-modal="true" 
    {{-- data-backdrop="static" --}} >

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header bg-info pt-2">

        <h5 class="modal-title text-dark"> Search </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      
      </div>

      <div class="modal-body">
          {{ $slot }}
      </div>

    </div>
  </div>
</div>