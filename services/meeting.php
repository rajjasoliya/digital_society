<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?PHP session_start(); include "header.php";  ?>
    <div class="container-fluid meeting-time">
        <?PHP if($_SESSION['user_role'] != 1){ ?>
        <div class="row">
            <div class="col-md-12 enter-txt"> <i class="fa fa-clock"></i> Enter Meeting Code Here <i class="fa fa-clock"></i></div>
            <div class="col-md-12 meeting-form">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="text" name="meeting_code" required placeholder="  Make Meeting Code" />
                    <button type="submit" name="submit1"><span>Join</span></button> 
                </form>
            </div>
            <div class="col-md-12 meet-form">
                <?PHP $query2 = "SELECT MAX(mid) AS id,code FROM meeting";
                $result2 = mysqli_query($connection,$query2) or die("Couldn't show results'");
                $row = mysqli_fetch_array($result2);
                    echo "<h2>Meeting code: {$row['code']}</h2>";
                ?>
            </div> 

        </div>
        <?PHP }else { ?>
        <div class="row">
            <div class="col-md-12 enter-txt"> <i class="fa fa-clock"></i> Add Meeting Code Here <i class="fa fa-clock"></i></div>
            <div class="col-md-12 meeting-form">
                <form method ="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <input type="text" name="meeting_code" required placeholder="  Enter Meeting Code" />
                    <button type="submit" name="submit2"><span>Join</span></button> 
                </form>
            </div> 
        </div>
        <?PHP } ?>
    </div>
    <?PHP 
    
    if(isset($_POST['submit2'])){
        $code = $_POST['meeting_code'];
        $query = "INSERT INTO meeting(code) VALUES('$code')";
        $result =  mysqli_query($connection, $query) or die("Error in adding meeting");

    }else if(isset($_POST['submit1'])){
        $code = $_POST['meeting_code'];
        header("Location:https://meet.google.com/$code") or die("Error in Joining meeting");
    }
    
    ?>
</body>
</html>