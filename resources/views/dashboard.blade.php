<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5 space-y-6">
            <h2 class="text-2xl font-bold">Panel de Usuario</h2>
            <nav>
                <ul class="space-y-4">
                    <li><a href="#" class="block py-2 px-4 bg-gray-700 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Perfil</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Configuración</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <!-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> -->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();" class="block py-2 px-4 hover:bg-red-700 rounded">Cerrar
                                sesión</a>

                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-5">Dashboard - Usuarios</h1>

            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold">Bienvenido al sistema</h2>
                <p class="text-gray-700">Estás logueado como usuario.</p>
            </div>
        </main>
    </div>
</body>

</html>