@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-icon" role="alert">
            <i class="fa fa-close"></i>
            {{ $error }}
        </div>
    @endforeach
@endif