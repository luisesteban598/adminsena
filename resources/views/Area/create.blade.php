@extends('layouts.dashboard')

@section('title', 'Nueva Área — AdminSENA')
@section('page-title', 'Áreas')

@section('content')

    <div class="card" style="max-width: 480px; margin: 0 auto;">
        <h1>Registrar Área</h1>

        <form action="{{ route('area.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar área</button>
        </form>
    </div>

@endsection
