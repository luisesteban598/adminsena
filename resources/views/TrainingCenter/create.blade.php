@extends ('layouts.app')
@section('content')
<br>
     <h1>centros de formacion</h1>

    <form action="{{route('trainingCenter.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <label>
        Nombre:
        <br>
        <input type="text" name="name">
    </label>
    <br>
    <label>
        location:
        <br>
        <input type="text" name="location">
    </label>



    <button type="submit">Enviar Formulario:</button>
    </form>
@endsection