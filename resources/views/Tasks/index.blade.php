@extends('Tasks.base')

@section('title', $user->name)
    
@section('content') 
    <div class="container">
        <h2>Liste des taches</h2>
        <div>
            @include('shared.flash')
        </div>
        <div class="row">
            @forelse ($user->tasks as $task)
                <div class="col-3 mb-4">
                    @include('Tasks.task')
                </div>
            @empty
                <div class="alert alert-warning col">
                    Aucun tache disponible pour le moment (ajouter une nouvelle tache <i class="bi bi-arrow-up-left" style="color: red"></i>) !
                </div>
            @endforelse
        </div>
    </div>

    @include('Tasks.addForm')
@endsection