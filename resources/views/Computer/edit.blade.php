@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Editar computador</h2>
                <form action="{{ route('computer.update', $computer) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input type="number" name="number" class="form-control" value="{{ old('number', $computer->number) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="brand" class="form-control" value="{{ old('brand', $computer->brand) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
