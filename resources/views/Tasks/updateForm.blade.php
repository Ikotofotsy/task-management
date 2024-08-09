<div class="modal fade" id="{{ '_' . $task->id }}" tabindex="-1" aria-labelledby="{{ '_' . $task->id . 'Label'}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ '_' . $task->id . 'Label'}}">{{ $task->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update', $task) }}" method="post">
          @csrf
          <div class="modal-body">
                  
                  @include('shared.input', [
                    'type' => 'text',
                    'class' => 'col',
                    'name' => 'title',
                    'label' => 'Titre',
                    'value' => $task->title
                  ])
                  @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'description',
                    'label' => 'Description',
                    'value' => $task->description
                  ])
        
                    @include('shared.checkbox',[
                        'label' => 'Completee',
                        'name' => 'completed',
                        'value' => $task->completed
                    ])
                
                <div class="form-group my-3">
                    <label class="form-label">Delais</label>
                    <input type="date" name="deadline" value="{{ $task->deadline }}">
                </div>
                  
                  
                  <ul class="list-group mt-2">
                    <li class="list-group-item text-secondary">
                        Date de creation : {{ $task->created_at }}
                    </li>
                    <li class="list-group-item text-secondary">
                        Derniere modification : {{ $task->updated_at }}
                    </li>
                    @if (!empty($task->deadline))
                        <li class="list-group-item text-secondary">
                            Deadline : {{ $task->deadline }}
                        </li>
                        <li class="list-group-item text-secondary">
                            Etat : {{ $task->deadlineStatus()['mssg'] }}
                        </li>
                    @endif
                    
                </ul>
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
      
    