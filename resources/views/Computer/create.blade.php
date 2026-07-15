@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Crear computadora</h2>
                <form action="{{ route('computer.store') }}" method="POST" enctype="multipart/form-data">
                    <a href="{{ route('computer.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input type="number" name="number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="brand" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar formulario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection