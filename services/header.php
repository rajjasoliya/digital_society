<?php include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
<div class="header-bar">
    <div class="logo-txt">Digital Society <p class="tag">Digital Management Digital Life</p></div>
        <div class="headlinks">
            <a href="../home.php">HOME</a>
            <a href="index.php" style="font-weight: bold;">SERVICE</a>
            <a href="../contact.php">CONTACT</a>
            <?PHP
            if(isset($_SESSION['username'])){
                $username = $_SESSION['fname'];
                $register = "LOGOUT";
                $href="../logout.php";
            }
                else{
                    $href = "../registration.php";
                    $username = "SIGN IN";
                    $register = "SIGN UP";
                } ?>
            <a href="../index.php" class="login_username" style="text-align: center;border:2px solid #0A9FB4;border-radius:5px"><?PHP echo $username; ?></a>
            <a href="<?PHP echo $href; ?>" style="text-align: center;color:white;border-radius:5px;background:#0A9FB4"><?PHP echo $register; ?></a>
        </div>
        </div>
</body>
</html>