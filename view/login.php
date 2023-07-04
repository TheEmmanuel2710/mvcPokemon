<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Login</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="form-label">Usuario-Corrreo</label>
                <input type="email" name="txtCorreo" id="txtCorreo" class="form.-control">
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <input type="password" name="txtPassword" id="txtPassword">
            </div>
            <div class="row">
                <a class="btn btn-primary" onclick="login()">Ingresar</a>
            </div>
        </div>
    </div>
</body>

</html>
<script src="assets/js/login.js"></script>