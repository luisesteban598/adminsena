@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Registrar aprendiz</h2>
                <form action="{{ route('apprentice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Número de teléfono</label>
                        <input type="number" name="cell_number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Curso</label>
                        <select name="course_id" id="course_id" class="form-select">
                            <option value="">Seleccione un curso</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Equipo</label>
                        <select name="computer_id" id="computer_id" class="form-select">
                            <option value="">Seleccione un equipo</option>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar formulario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection