@extends('Tasks.base')

@section('title',  ($task->exists) ? $task->title : 'Nouveau tache')

@php
    $btn_mssg = ($task->exists) ? 'Modifer' : 'Enregistrer'
@endphp

@section('content')
<div class="container">
    <h2>@yield('title')</h2>
    
    <form action="{{ route(!($task->exists) ? 'store' : 'update', $task) }}" method="post">
        @csrf
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

        @if ($task->exists)
            @include('shared.checkbox',[
                'label' => 'Completee',
                'name' => 'completed',
                'value' => $task->completed
            ])
        @else
            <input type="hidden" name="completed" value="0">
        @endif
        
        <label>Delais</label>
            <input type="date" name="deadline" value="{{ $task->deadline }}">
        <div>
            <button class="btn btn-primary">{{ $btn_mssg }}</button>
        </div>
    </form>
</div>
    

@endsection