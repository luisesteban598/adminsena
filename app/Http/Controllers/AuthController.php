<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra la vista del formulario de inicio de sesión
    public function create()
    {
        return view('auth.login');
    }

    // Procesa los datos enviados desde el formulario de login
    public function store(Request $request)
    {
        // Validamos que el correo y la contraseña hayan sido enviados correctamente
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentamos iniciar sesión utilizando el correo y la contraseña
        // El segundo parámetro permite mantener la sesión iniciada
        // cuando el usuario selecciona "Recordarme"
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {

            // Si las credenciales son incorrectas,
            // regresamos al formulario y mostramos un mensaje de error
            return back()
                ->withErrors([
                    'email' => 'Las credenciales no coinciden con nuestros registros.'
                ])
                // Conservamos el correo escrito anteriormente
                ->onlyInput('email');
        }

        // Regeneramos la sesión después de iniciar sesión
        // para mejorar la seguridad de la aplicación
        $request->session()->regenerate();

        // Enviamos al usuario al dashboard
        // y mostramos un mensaje de éxito
        return redirect()
            ->route('dashboard')
            ->with('success', 'Sesión iniciada correctamente.');
    }

    // Muestra el formulario para crear una nueva cuenta
    public function showRegistro()
    {
        // Cargamos la vista register.blade.php
        // que se encuentra dentro de resources/views/auth
        return view('auth.registro');
    }

    // Procesa el formulario de registro de un nuevo usuario
    public function registro(Request $request)
    {
        // Validamos la información que el usuario escribió en el formulario
        $data = $request->validate([
            // El nombre es obligatorio y puede tener máximo 255 caracteres
            'name' => 'required|string|max:255',

            // El correo es obligatorio, debe tener formato de email
            // y no puede existir otro usuario con el mismo correo
            'email' => 'required|email|max:255|unique:users,email',

            // La contraseña debe tener mínimo 8 caracteres
            // y debe coincidir con password_confirmation
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Creamos el nuevo usuario en la base de datos
        $user = User::create([
            // Guardamos el nombre del usuario
            'name' => $data['name'],

            // Guardamos el correo electrónico
            'email' => $data['email'],

            // Encriptamos la contraseña antes de guardarla
            // Nunca debemos guardar las contraseñas directamente
            'password' => Hash::make($data['password']),
        ]);

        // Iniciamos sesión automáticamente con el usuario recién creado
        Auth::login($user);

        // Regeneramos la sesión para mejorar la seguridad
        $request->session()->regenerate();

        // Después de registrarse enviamos al usuario al dashboard
        return redirect()
            ->route('dashboard')
            ->with('success', 'Cuenta creada correctamente.');
    }

    // Cierra la sesión del usuario actualmente autenticado
    public function destroy(Request $request)
    {
        // Cerramos la sesión utilizando el sistema de autenticación de Laravel
        Auth::logout();

        // Eliminamos todos los datos almacenados en la sesión
        $request->session()->invalidate();

        // Generamos un nuevo token CSRF para proteger los siguientes formularios
        $request->session()->regenerateToken();

        // Después de cerrar sesión regresamos a la página principal
        return redirect()
            ->route('home')
            ->with('success', 'Sesión cerrada.');
    }
}