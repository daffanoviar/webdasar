<?php
session_start();
if (!isset($_SESSION['username'])) {
    // User is already logged in, redirect to welcome page  
    header("Location: login.php");
    exit();
}

//cek apakah session counter sudah diset
if (!isset($_SESSION['counter'])){
    $_SESSION['counter']=1;
}else{
    $_SESSION['counter']+=1;
}
?>
<html>
    <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <h1><?php echo "Selamat datang" . $_SESSION['username']; ?></h1>
    </body>
</html>