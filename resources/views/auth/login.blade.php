<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — AdminSENA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="logo">
                <h1>SENA</h1>
                <p>Administración SENA</p>
            </div>

            {{-- Muestra los errores de validación --}}
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Muestra mensajes de éxito --}}
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Formulario de inicio de sesión --}}
            <form action="{{ route('login.store') }}" method="POST">

                {{-- Token de seguridad CSRF --}}
                @csrf

                <div class="form-group">

                    <label for="email">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Ingrese su correo"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="password">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingrese su contraseña"
                        required
                    >

                </div>

                <div class="remember">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        value="1"
                    >

                    <label for="remember">
                        Recordarme
                    </label>

                </div>

                <button type="submit" class="btn-login">
                    Iniciar sesión
                </button>

            </form>

            <div class="register-link">

                <p>
                    ¿No tienes una cuenta?
                    <a href="{{ route('registro') }}">
                        Regístrate aquí
                    </a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>