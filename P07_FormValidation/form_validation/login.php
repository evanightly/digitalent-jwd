<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/tampilan.css">
    <title>Login</title>
</head>

<body>
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-sm-4 mx-auto pt-5">

                <form class="p-4 px-5 bg-grey rounded" action="validasi.php" method="post">
                    <?php
                    session_start();
                    if ($_SESSION && $_SESSION['message']) { ?>
                        <div class="col bg-danger rounded text-light p-3 mb-2">
                            <span classx="m-0"><?= $_SESSION['message'] ?></span>
                        </div>
                    <?php
                        session_destroy();
                    } ?>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pass" class="form-label">Password</label>
                        <input id="pass" type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100 mt-2">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>