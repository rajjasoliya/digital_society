<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?PHP session_start(); include "header.php";  ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 notice-image"><img src="../img/notice.webp" class="img-fluid">
            <div class="col-md-12 overlap-txt">
                <?PHP if($_SESSION['user_role'] != 1){
                    $day = date("d");
                    $month = date("m");
                    $year = date("Y");
                    $query = "SELECT * FROM notice WHERE ndate = CURDATE() GROUP BY nid DESC";
                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result) != 0){
                        $row = mysqli_fetch_array($result);
                        echo $row['notice'];
                    }else{
                        echo "NO NOTICE TODAY";
                    }
                }else{
                    ?>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <textarea name="notice" rows="10" cols="80" placeholder="Enter your notice ..."></textarea>
                <input type="submit" name="submit" value="Submit"/>
                </form>
                    <?PHP
                    if(isset($_POST['submit'])){
                    //     $day = date("d");
                    // $month = date("m");
                    // $year = date("Y");
                    // $date = STR_TO_DATE('$day-$month-$year', '%d-%m-%Y');
                    $notice = $_POST['notice'];
                        $query2 = "INSERT INTO notice(notice,ndate) VALUES ('$notice',CURDATE())";
                        $result = mysqli_query($connection, $query2) or die("notice does not added");
                    }
                } ?>
            </div>
        </div>
        </div>
    </div>
</body>
</html>