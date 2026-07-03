@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Cursos</h2>
            <a href="{{ url('course/create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Número</th>
                        <th>Día</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_number }}</td>
                            <td>{{ $course->day }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection