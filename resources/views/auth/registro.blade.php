<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta — AdminSENA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="login-split">
        <div class="login-split-brand">
            <div class="logo-big">SENA</div>
            <h2>ADMIN SENA</h2>
            <p>Sistema de Gestión Institucional</p>
        </div>

        <div class="login-split-form">
            <div class="login-form-card">
                <h2>Crear nueva cuenta</h2>
                <p class="subtitle">Diligencia el formulario para registrarte</p>

                @if ($errors->any())
                    <div class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('registro.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#128100;</span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   placeholder="Ingrese su nombre" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#9993;</span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   placeholder="usuario@sena.edu.co" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#128274;</span>
                            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#128274;</span>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   placeholder="Repita su contraseña" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">&#8594; Crear cuenta</button>
                </form>

                <p class="footnote">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
                <p class="footnote">&copy; {{ date('Y') }} SENA · Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

</body>
</html>