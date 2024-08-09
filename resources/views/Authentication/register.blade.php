@extends('Authentication.base')

@section('title', 'S\'inscrire')
    
@section('content')
<div>
    <h4 class="text-center my-4 ">@yield('title')</h4>

    <form action="{{ route('register') }}" method="post" class="form-auth border rounded-4 my-5 mx-auto p-3">
        @csrf
        @include('shared.input', [
            'type' => 'text',
            'class' => 'col',
            'name' => 'name',
            'label' => 'Pseudo'
        ])
        @include('shared.input', [
            'type' => 'email',
            'class' => 'col',
            'name' => 'email',
            'label' => 'Email'
        ])
        @include('shared.input', [
            'type' => 'password',
            'class' => 'col',
            'name' => 'password',
            'label' => 'Mot de passe'
        ])
        @include('shared.input', [
            'type' => 'password',
            'class' => 'col',
            'name' => 'password_confirmation',
            'label' => 'Mot de passe de confirmation'
        ])
        <div class="text-center">
            <button class="btn btn-dark mx-auto">@yield('title')</button>
        </div>
    </form>
</div>
@endsection