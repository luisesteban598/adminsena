@extends ('layouts.app')
@section('content')
<br>
        <h1>Crear Computadora</h1>

    <form action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    <label>
        numero:
        <br>
        <input type="number" name="number">
    </label>
    <br>
    <label>
        marca:
        <br>
        <input type="text" name="brand">
    </label>



    <button type="submit">Enviar Formulario:</button>
    </form> 
@endsection