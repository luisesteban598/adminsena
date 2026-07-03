@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Computadores</h2>
            <a href="{{ url('computer/create') }}" class="btn btn-primary btn-sm">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Número</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($computers as $computer)
                        <tr>
                            <td>{{ $computer->id }}</td>
                            <td>{{ $computer->number }}</td>
                            <td>{{ $computer->brand }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection