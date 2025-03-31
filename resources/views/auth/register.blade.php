<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('Backend/assets/img/logo.png') }}" alt="logo" width="200"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700">Name</label>
                                        <br>
                                        <input id="name" type="text" name="name" 
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('name') }}" required autofocus autocomplete="name">
                                        @error('name')
                                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700">Email</label>
                                        <br>
                                        <input id="email" type="email" name="email"
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('email') }}" required autocomplete="username">
                                        @error('email')
                                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="password" class="block text-gray-700">Password</label>
                                        <br>
                                        <input id="password" type="password" name="password"
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                                        <br>
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            required autocomplete="new-password">
                                        @error('password_confirmation')
                                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Actions -->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-info btn-lg btn-block">Register</button>
                                        <button type="button" class="btn btn-secondary btn-block" onclick="window.history.back()">Regresar</button>
                                    </div>
                                </form>

                                <div class="text-center mt-4">
                                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Already have an account? Log in</a>
                                </div>
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

    <!-- Template JS File -->
    <script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/custom.js') }}"></script>
</body>

</html>
