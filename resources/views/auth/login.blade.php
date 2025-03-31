<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" rel="stylesheet"
        href="{{ asset('Backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->


    
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('Backend/assets/img/logo.png') }}" alt="logo" width="200"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">

                                <form method="POST" action="{{ route('login') }}" class="mt-6">
                                    @csrf

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-gray-700">Correo Electrónico</label>
                                        <br>
                                        <input id="email" type="email" name="email"
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            required>
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <label for="password" class="block text-gray-700">Contraseña</label>
                                        <br>
                                        <input id="password" type="password" name="password"
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            required>
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="flex items-center mt-4">
                                        <input id="remember_me" type="checkbox" name="remember" class="mr-2">
                                        <label for="remember_me" class="text-gray-600">Recuérdame</label>
                                    </div>

                                    <!-- Botón de Login -->
                                    <div class="mt-6">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">Iniciar
                                            Sesión</button>
                                        <button class="btn btn-secondary btn-block"
                                            onclick="window.history.back()">Regresar</button>

                                    </div>
                                </form>


                                <!-- esta parte del codigo todavia no la entiedno muy vien pero al ingrezar los codigos para crear el login por
        medio de brezeers me creo el apartado de restarurar contraseña   -->
                                <!-- Enlace para recuperar contraseña
        <div class="text-center mt-4">
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
        </div> -->
                            </div>



                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('Backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/custom.js') }}"></script>
</body>

</html>