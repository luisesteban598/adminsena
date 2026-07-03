@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Aprendices</h2>
            <a href="{{ url('apprentice/create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice->id }}</td>
                            <td>{{ $apprentice->name }}</td>
                            <td>{{ $apprentice->email }}</td>
                            <td>{{ $apprentice->cell_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection