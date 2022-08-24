<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/tampilan.css">
    <title>Home</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION && $_SESSION['message']) { ?>
        <script>
            alert(<?= json_encode($_SESSION['message']) ?>)
        </script>
    <?php
        session_destroy();
    } ?>
    <h1>Halaman Index</h1>
</body>

</html>