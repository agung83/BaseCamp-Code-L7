@error('foto')
<div class="alert alert-danger">
    {{$message}}
</div>
@enderror

@if ($message = Session::get('save'))
<div class="alert alert-success">
    {{ $message}}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    {{ $message}}
</div>
@endif


@if ($message = Session::get('update'))
<div class="alert alert-warning">
    {{ $message}}
</div>
@endif
@if ($message = Session::get('delete'))
<div class="alert alert-danger">
    {{ $message}}
</div>
@endif
