@extends ('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Crear área</h2>
                <form action="{{ route('area.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear área</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection