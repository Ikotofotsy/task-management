<div class="modal fade border-danger" id="{{ 'delete_'.$task->id }}" tabindex="-1" aria-labelledby="{{ 'delete_'.$task->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="{{ 'delete_'.$task->id }}Label">Attention! cette action est irreversible.</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('delete', $task) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Etes vous sure de supprimer la tache {{ $task->title }}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
  