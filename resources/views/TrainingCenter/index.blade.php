@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Centros de formación</h2>
            <a href="{{ route('trainingCenter.create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainingCenters as $trainingCenter)
                        <tr>
                            <td>{{ $trainingCenter->id }}</td>
                            <td>{{ $trainingCenter->name }}</td>
                            <td>{{ $trainingCenter->location }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('trainingCenter.edit', $trainingCenter) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('trainingCenter.destroy', $trainingCenter) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que desea eliminar este centro?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection