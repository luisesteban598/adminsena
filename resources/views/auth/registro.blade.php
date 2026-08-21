<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — AdminSENA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="registro-container">

        <div class="registro-card">

            <div class="logo">

                <h1>SENA</h1>

                <p>Crear nueva cuenta</p>

            </div>

            {{-- Muestra los errores de validación --}}
            @if ($errors->any())

                <div class="error">

                    @foreach ($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach

                </div>

            @endif

            {{-- Formulario de registro --}}
            <form action="{{ route('registro.store') }}" method="POST">

                {{-- Token de seguridad CSRF --}}
                @csrf

                <div class="form-group">

                    <label for="name">
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Ingrese su nombre"
                        required
                    >

                </div>

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
                        placeholder="Mínimo 8 caracteres"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirmar contraseña
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repita su contraseña"
                        required
                    >

                </div>

                <button type="submit" class="btn-register">
                    Crear cuenta
                </button>

            </form>

            <div class="login-link">

                <p>
                    ¿Ya tienes una cuenta?

                    <a href="{{ route('login') }}">
                        Inicia sesión
                    </a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>