<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-content {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            display: none;
            width: 100%;
            box-sizing: border-box;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .form-content.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .form-content h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-sizing: border-box;
            font-weight: bold;
            outline: none;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .icon {
            margin-right: 5px;
        }

        .clinic-logo {
            width: 200px;
            margin-bottom: 15px;
            align-self: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Clinic Logo" class="clinic-logo">
        <div class="form-content login active">
            <h2><i class="icon fas fa-user-md"></i>Login</h2>
            @if ($errors->has('login'))
                <div class="error-message">{{ $errors->first('login') }}</div>
            @endif
            <form id="loginForm" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="icon fas fa-envelope"></i>Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="icon fas fa-lock"></i>Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit"><i class="icon fas fa-sign-in-alt"></i>Login</button>
                </div>
            </form>
            <p>Belum punya akun? <a href="{{ route('registerForm') }}">Daftar di sini</a>.</p>
        </div>
        <p><a href="{{ route('password.request') }}">Lupa Password?</a>.</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
