<?php
include('./includes/config_session.inc.php');
include('./database/db_helper.php');
connectToDatabase();
createTables();
// insertSampleProduct()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./scripts/form_validate.js"></script>
    <script src="./scripts/get_text_file.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include('./components/navbar.php');

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'home') {
            include('./pages/home.php');
        } elseif ($page === 'products') {
            include('./pages/products.php');
        } elseif ($page === 'login') {
            include('./pages/login.php');
        } elseif ($page === 'register') {
            include('./pages/register.php');
        } else {
            echo 'Page not found.';
        }
    } else {
        include('./pages/home.php');
    }
    ?>

</body>

</html>