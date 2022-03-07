@if ($message = Session::get('success'))
<div class="alert alert-success">{{ $message }}</div>
@endif
@if ($errors->any())
<div class="alert alert-danger" style="height: auto">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif