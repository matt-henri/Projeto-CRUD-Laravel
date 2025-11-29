@if(session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
            {{ session('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif
