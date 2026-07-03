@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Instructores</h2>
            <a href="{{ url('teacher/create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection