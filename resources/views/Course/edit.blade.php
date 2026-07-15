@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Editar curso</h2>
                <form action="{{ route('course.update', $course) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Número del curso</label>
                        <input type="number" name="course_number" class="form-control" value="{{ old('course_number', $course->course_number) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Día</label>
                        <input type="date" name="day" class="form-control" value="{{ old('day', $course->day) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="training_center_id" class="form-label">Centro de formación</label>
                        <select name="training_center_id" id="training_center_id" class="form-select">
                            <option value="">Seleccione un centro de formación</option>
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}" {{ old('training_center_id', $course->training_center_id) == $training_center->id ? 'selected' : '' }}>{{ $training_center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="area_id" class="form-label">Área</label>
                        <select name="area_id" id="area_id" class="form-select">
                            <option value="">Seleccione un área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
