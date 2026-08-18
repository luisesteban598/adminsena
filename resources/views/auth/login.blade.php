<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — AdminSENA</title>
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
                <h2>Iniciar sesión</h2>
                <p class="subtitle">Ingresa tus credenciales para continuar</p>

                @if ($errors->any())
                    <div class="alert alert-error">{{ $errors->first() }}</div>
                @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#9993;</span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   placeholder="usuario@sena.edu.co" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-icon-group">
                            <span class="icon-left">&#128274;</span>
                            <input type="password" id="password" name="password" placeholder="••••••••" required>
                            <button type="button" class="icon-toggle" data-toggle-password="password">&#128065;</button>
                        </div>
                    </div>

                    <div class="login-row-between">
                        <label>
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">&#8594; Iniciar sesión</button>
                </form>

                <p class="footnote">&copy; {{ date('Y') }} SENA · Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

</body>
</html>
