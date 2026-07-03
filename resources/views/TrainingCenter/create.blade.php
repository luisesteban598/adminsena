@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Centros de formación</h2>
                <form action="{{ route('trainingCenter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar formulario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection