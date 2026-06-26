@extends ('layouts.app')
@section('content')

    <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 

        <label>
            numero del curso:
            <br>
            <input type="number" name="course_number">
        </label>
        <br>
        <label>
            dia:
            <br>
            <input type="date" name="day">
        </label>
        <br>
        <label for="training_center_id">id centro fromacion</label>
        <select name="training_center_id" id="training_center_id" class="form-control">
            <option value="">seleccione un centro de formacion</option>
            @foreach($training_centers as $training_center)
            <option value="{{$training_center->id}}">
                {{$training_center->number}}
            </option>
            @endforeach
        </select>
        <br><br>
        <label for="area_id">id centro fromacion</label>
        <select name="area_id" id="area_id" class="form-control">
            <option value="">seleccione un centro de formacion</option>
            @foreach($areas as $area)
            <option value="{{$area->id}}">
                {{$area->number}}
            </option>
            @endforeach
        </select>


        <button type="submit">Enviar</button>
    </form>
@endsection