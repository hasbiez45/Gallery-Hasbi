<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="vh-100 gradient-custom">

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <form method="POST" action="{{ route('login') }}" class="card bg-white" style="border-radius: 1rem;">
                    @csrf

                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase"><i class="fas fa-sign-in-alt"></i> Login</h2>
                            <p class="text-muted mb-5">Please enter your login and password!</p>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" id="typeEmailX" class="form-control" name="email" required>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX"><i class="fas fa-lock"></i> Password</label>
                                <input type="password" id="typePasswordX" class="form-control" name="password" required>
                            </div>
                            <button class="btn btn-primary btn-lg px-5" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="{{ route('auth.register') }}" class="text-muted fw-bold">Sign Up</a></p>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
