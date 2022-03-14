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

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">Log In</div>
                <div class="card-body">
                   <form action="../scripts/login.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                            <input type="email" class="form-control" placeholder="Your@email.com" name="email">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-secondary" >Submit</button>
                        <div class="form-group form-check  my-3">
                            <a href="register.php">Register</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>