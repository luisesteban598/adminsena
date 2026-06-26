@extends ('layouts.app')
@section('content')
    <h1>Crear Área</h1>

    <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <label>
        Nombre:
        <br>
        <input type="text" name="name">
    </label>
    <br>



    <button type="submit">Crear Área</button>
    </form>
    
@endsection