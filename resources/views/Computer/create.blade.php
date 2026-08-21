@extends('layouts.dashboard')

@section('title', 'Nuevo Equipo — AdminSENA')
@section('page-title', 'Computadores')

@section('content')

    <div class="card" style="max-width: 480px; margin: 0 auto;">
        <h1>Registrar Equipo de Cómputo</h1>

        <form action="{{ route('computer.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="number">Número</label>
                <input type="number" id="number" name="number" value="{{ old('number') }}" required>
                @error('number')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand">Marca</label>
                <input type="text" id="brand" name="brand" value="{{ old('brand') }}" required>
                @error('brand')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar equipo</button>
        </form>
    </div>

@endsection
