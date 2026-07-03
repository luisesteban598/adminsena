@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Crear curso</h2>
                <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Número del curso</label>
                        <input type="number" name="course_number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Día</label>
                        <input type="date" name="day" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="training_center_id" class="form-label">Centro de formación</label>
                        <select name="training_center_id" id="training_center_id" class="form-select">
                            <option value="">Seleccione un centro de formación</option>
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}">{{ $training_center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="area_id" class="form-label">Área</label>
                        <select name="area_id" id="area_id" class="form-select">
                            <option value="">Seleccione un área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection