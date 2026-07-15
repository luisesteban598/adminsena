@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Editar instructor</h2>
                <form action="{{ route('teacher.update', $teacher) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $teacher->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="area_id" class="form-label">Área</label>
                        <select name="area_id" id="area_id" class="form-select">
                            <option value="">Seleccione un área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $teacher->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="training_center_id" class="form-label">Centro de formación</label>
                        <select name="training_center_id" id="training_center_id" class="form-select">
                            <option value="">Seleccione un centro</option>
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}" {{ old('training_center_id', $teacher->training_center_id) == $training_center->id ? 'selected' : '' }}>{{ $training_center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
