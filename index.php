<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Forumas</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a href="http://localhost/forum/views/login.php" class="navbar-brand">WELCOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarItems">
            <!-- Menu items -->
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item">
                    <a href="http://localhost/galerija/views/file_upload.php" class="nav-link">File Upload Form</a>
                </li> -->
            </ul>
            <!-- Authentication links -->
            <!-- <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="http://localhost/forum/views/login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/forum/views/register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Log out</a>
                </li>
            </ul> -->

        </div>
    </div>
</nav>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">Log In</div>
                <div class="card-body">
                   <form action="./scripts/login.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                            <input type="email" class="form-control" placeholder="Your@email.com" name="email">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-secondary" >Submit</button>
                        <div class="form-group form-check  my-3">
                            <a href="views/register.php">Register</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>