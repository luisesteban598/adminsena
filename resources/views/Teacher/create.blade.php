@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Centros de formación</h2>
                <form action="{{ route('trainingCenter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


    <label>
        Nombre Instructor: 
        <input type="text" name="name">
    </label>
    <br><br>

    <label>
        email: 
        <input type="email" name="email">
    </label>
    <br><br>

    <label for="area_id">Area:</label>
        <select name="area_id" id="area_id" class="form-control">
            <option value="">Selecione area</option>
            @foreach($areas as $area)
                <option value="{{$area->id}}">
                    {{$area->name}}
                </option>
            @endforeach

        </select>

        <br><br>
    <label for="training_center_id">Centro de Formacion:</label>
        <select name="training_center_id" id="training_center_id" class="form-control">
            <option value="">Selecione un centro de formacion</option>
            @foreach($training_centers as $training_center)
                <option value="{{$training_center->id}}">
                    {{$training_center->name}}
                </option>
            @endforeach

        </select>
    <br><br>
        


     <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>
@endsection