@php
    if(!$task->completed){
        if (!empty($task->deadline)) {
            $deadlineStatus = $task->deadlineStatus()['status'];

            if($deadlineStatus == '0'){
                $status = [
                    'color' => 'red',
                    'border' => 'danger'
                ];

            }elseif ($deadlineStatus == '1') {
                $status = [
                    'color' => 'yellow',
                    'border' => 'warning'
                ];
            }
            elseif ($deadlineStatus == '2') {
                $status = [
                    'color' => 'blue',
                    'border' => 'primary'
                ];
            }
            elseif ($deadlineStatus == '3') {
                $status = [
                    'color' => 'grey',
                    'border' => 'secondary'
                ];
            }
            else{
                $status = [
                    'color' => 'black',
                    'border' => 'dark'
                ];
            }
        }
        else{
            $status = [
                    'color' => 'black',
                    'border' => 'dark'
                ];
        }
        
    }else{
        $status = [
            'color' => 'green',
            'border' => 'success'
        ];
    }
@endphp

<div class="card border-3 border-{{ $status['border'] }} mb-3" style="max-width: 18rem; height: 15rem">
    <div class="card-header row justify-content-between" style="height: 4rem">
        <span class="col-10">{{ $task->title }} </span>
        <div class="col-2">
            
            @if (!$task->completed)
                @if (!empty($task->deadline))
                    @if ($task->deadlineStatus()['status'] == '0')
                        <i class="bi bi-dash-circle"></i>
                    @else
                        <i class="bi bi-circle"></i>
                    @endif  
                @endif
            @else 
                <i class="bi bi-check2-circle"></i> 
            @endif

        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            @if (!$task->completed)
                @if (!empty($task->deadline))
                    <p><i class="bi bi-alarm"></i> J-{{ $task->remainingTime()['days'] }}</p>
                    <p>
                        @switch( $task->deadlineStatus()['status'])
                            @case('0')
                                <i class="bi bi-emoji-grimace"></i>
                                @break
                            @case('1')
                                <i class="bi bi-emoji-neutral"></i>
                                @break
                            @case('2')
                                <i class="bi bi-emoji-smile"></i>
                                @break
                            @case('3')
                                <i class="bi bi-emoji-grin"></i>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $task->deadlineStatus()['mssg'] }}
                    </p>
                @else
                    <div class="text-center justify-content-center aling-items-center">
                        Relax <i class="bi bi-emoji-sunglasses"></i>
                    </div>
                @endif
            @else
                <p class="text-secondary text-center">{{ $task->updated_at }}</p>
            @endif
            
        </h5>
    </div>
    <div class="card-footer  row align-items-center justify-content-between">
        <div class="col-4  text-center" data-bs-toggle="modal" data-bs-target="#{{ '_'.$task->id }}">
            <i class="bi bi-info-circle"></i>
        </div>
        <div class="col-4  text-center" data-bs-toggle="modal" data-bs-target="#{{ 'delete_'.$task->id }}">
            <i class="bi bi-trash3-fill" style="color: red"></i>
        </div>
        {{-- <div class="col-4  text-center">        
            <form action="{{ route('delete', $task) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn"><i class="bi bi-trash3-fill" style="color: red"></i></button>
            </form>
        </div> --}}
        
    </div>
</div>

@include('Tasks.updateForm')
@include('Tasks.deleteModal')
  
  