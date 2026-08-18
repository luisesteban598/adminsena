@extends('layouts.dashboard')

@section('title', 'Nuevo Centro de Formación — AdminSENA')
@section('page-title', 'Centros de Formación')

@section('content')

    <div class="card" style="max-width: 480px; margin: 0 auto;">
        <h1>Registrar Centro de Formación</h1>

        <form action="{{ route('trainingCenter.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" required>
                @error('location')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar centro</button>
        </form>
    </div>

@endsection
