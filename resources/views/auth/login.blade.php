<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — AdminSENA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f8fafc;
            min-height: 100vh;
        }

        /* Contenedor principal dividido */
        .login-container {
            display: flex;
            min-height: 100vh;
            width: 100vw;
        }

        .login-sidebar-left {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            /* Reducimos la opacidad del filtro a un 35%-45% para dar paso a la foto */
            background: linear-gradient(rgba(15, 23, 42, 0.45), rgba(71, 72, 70, 0.35)), 
                        url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat !important;
            color: #ffffff;
            text-align: center;
        }

        /* Sombra de texto para asegurar que los títulos blancos sigan siendo 100% legibles */
        .brand-wrapper h1, 
        .brand-wrapper p {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
        }

        /* Botón Volver al Inicio en la esquina superior */
        .btn-back-top {
            position: absolute;
            top: 25px;
            left: 25px;
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 8px 18px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            backdrop-filter: blur(6px);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back-top:hover {
            background: #ffffff;
            color: #39A900 !important;
            transform: translateY(-2px);
        }

        /* Contenido de marca izquierda */
        .brand-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 400px;
        }

        .sena-logo-left {
            width: 110px;
            height: auto;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        }

        .brand-wrapper h1 {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .brand-wrapper p {
            font-size: 1.05rem;
            opacity: 0.95;
            font-weight: 300;
        }

        /* COLUMNA DERECHA: Formulario */
        .login-content-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8fafc;
            padding: 2rem;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
        }

        .sena-logo-right {
            width: 75px;
            height: auto;
            margin: 0 auto 1rem auto;
            display: block;
        }

        /* Estilos del Formulario */
        .form-title {
            color: #0f172a;
            font-weight: 800;
            font-size: 1.6rem;
            text-align: center;
            margin-bottom: 0.25rem;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .input-icon-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .icon-left {
            position: absolute;
            left: 12px;
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
        }

        .input-icon-group input {
            width: 100%;
            padding: 10px 14px 10px 38px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-icon-group input:focus {
            border-color: #39A900;
            box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15);
        }

        .row-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.825rem;
        }

        .row-between label {
            color: #475569;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .link-sena {
            color: #39A900;
            text-decoration: none;
            font-weight: 600;
        }

        .link-sena:hover {
            text-decoration: underline;
        }

        .btn-submit-sena {
            width: 100%;
            background-color: #39A900;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            box-shadow: 0 4px 12px rgba(57, 169, 0, 0.25);
        }

        .btn-submit-sena:hover {
            background-color: #2e8800;
        }

        .btn-submit-sena:active {
            transform: scale(0.99);
        }

        .alert-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .footnote {
            text-align: center;
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 1.5rem;
        }

        /* Adaptación a móviles */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .login-sidebar-left {
                padding: 4rem 1.5rem 2.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        
        <!-- LADO IZQUIERDO: Imagen + Verde SENA + Logo Oficial PNG -->
        <div class="login-sidebar-left">
            
            <a href="{{ route('home') }}" class="btn-back-top">
                &#8592; Volver al Inicio
            </a>

            <div class="brand-wrapper">
                <!-- Logo SENA en PNG (Lado izquierdo) -->
                <img src="{{ asset('img/logo-sena.png') }}" alt="Logo SENA" class="sena-logo-left">

                <h1>ADMIN SENA</h1>
                <p>Sistema de Gestión Institucional</p>
            </div>
        </div>

        <!-- LADO DERECHO: Tarjeta de Formulario -->
        <div class="login-content-right">
            <div class="login-card">
                
                <!-- Logo SENA en PNG (Lado derecho) -->
                <img src="{{ asset('img/logo-sena.png') }}" alt="Logo SENA" class="sena-logo-right">

                <h2 class="form-title">Iniciar sesión</h2>
                <p class="form-subtitle">Ingresa tus credenciales para continuar</p>

                {{-- Notificaciones de estado --}}
                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login.store') }}">
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
                        </div>
                    </div>

                    <div class="row-between">
                        <label>
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                        <a href="#" class="link-sena">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn-submit-sena">
                        &#8594; Iniciar sesión
                    </button>

                    <p class="footnote">
                        ¿No tienes una cuenta? <a href="{{ route('registro.index') }}" class="link-sena">Regístrate aquí</a>
                    </p>
                    <p class="footnote">&copy; {{ date('Y') }} SENA · Todos los derechos reservados.</p>
                </form>

            </div>
        </div>

    </div>

</body>
</html>