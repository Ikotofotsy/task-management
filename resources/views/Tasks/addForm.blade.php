<div class="modal fade" id="add_form" tabindex="-1" aria-labelledby="add_formLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="add_formLabel">Nouvelle tache</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="modal-body">
                
                @include('shared.input', [
                  'type' => 'text',
                  'class' => 'col',
                  'name' => 'title',
                  'label' => 'Titre'
                ])
                @include('shared.input', [
                  'type' => 'textarea',
                  'class' => 'col',
                  'name' => 'description',
                  'label' => 'Description'
                ])
      
                <input type="hidden" name="completed" value="0">
              <div class="form-group my-3">
                <label class="form-label">Delais</label>
                <input type="date" name="deadline">
              </div>
                
                
            
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary">Enregister</button>
        </div>
      </form>
    </div>
  </div>
</div>

    
  