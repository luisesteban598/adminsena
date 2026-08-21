@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Editar aprendiz</h2>
                <form action="{{ route('apprentice.update', $apprentice) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $apprentice->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $apprentice->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Número de teléfono</label>
                        <input type="text" name="cell_number" class="form-control" value="{{ old('cell_number', $apprentice->cell_number) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Curso</label>
                        <select name="course_id" id="course_id" class="form-select">
                            <option value="">Seleccione un curso</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}>{{ $course->course_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Equipo</label>
                        <select name="computer_id" id="computer_id" class="form-select">
                            <option value="">Seleccione un equipo</option>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}" {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}>{{ $computer->number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
