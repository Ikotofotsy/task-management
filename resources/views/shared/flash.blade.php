@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if ($errors->any())
    <ul class="list-group m-3">
        @foreach ($errors->all() as $err)
            <li class="list-group-item text-danger text-center border-danger">{{ $err }}</li>
        @endforeach 
    </ul>
@endif