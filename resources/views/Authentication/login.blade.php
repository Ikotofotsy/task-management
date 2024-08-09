@extends('Authentication.base')

@section('title', 'Se connecter')


@section('content')
    <div>
        <h4 class="text-center my-4 ">@yield('title')</h4>

        <form action="{{ route('login') }}" method="post" class="form-auth border rounded-4 my-5 mx-auto p-3">
            @csrf
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
            <div class="text-center">
                <button class="btn btn-dark mx-auto">@yield('title')</button>
            </div>
        </form>
    </div>
@endsection