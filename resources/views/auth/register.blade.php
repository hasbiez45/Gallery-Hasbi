<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
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
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        label {
            margin-bottom: 8px;
            color: #555555;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
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

        .text-center {
            text-align: center;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Register User</h2>
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('auth.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"><i class="fa fa-user"></i> Username</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><i class="fa fa-key"></i> Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Register</button>
                </form>
                <hr>
                <p class="text-center">Already have an account? <a href="{{route('login')}}" class="text-decoration-none">Login Here!</a></p>
            </div>
        </div>
    </div>
</body>

</html>
