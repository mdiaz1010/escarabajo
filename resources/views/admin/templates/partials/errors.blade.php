@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <p>Corregir las siguientes observaciones:</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif