@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Centros de formación</h2>
            <a href="{{ url('trainingCenter/create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainingCenters as $trainingCenter)
                        <tr>
                            <td>{{ $trainingCenter->id }}</td>
                            <td>{{ $trainingCenter->name }}</td>
                            <td>{{ $trainingCenter->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection