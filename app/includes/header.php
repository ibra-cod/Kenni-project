<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Login-and-register.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/order.css">
</head>
<body>
    <?php 
            if ($_SERVER['SCRIPT_NAME'] != '/login.php' 
            && $_SERVER['SCRIPT_NAME'] != '/register.php') {
                require '../app/includes/navbar_user.php';
            } 
           
    ?>