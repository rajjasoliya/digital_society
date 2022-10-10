<?PHP

session_start();
if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/digital_society/") or die("Sorry Something went wrong !!!");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/service.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?PHP include "header.php"; ?>
    <?PHP include "../config.php"; ?>
    <section id="section-2">
        <div class="categories">Our Services</div>
        <div class="parent container">
            <div class="row">
                <?PHP
                $query = "SELECT * FROM service ";
                $result = mysqli_query($connection, $query) or die("error in query");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="category-div col-2" style="margin:50px;"><a style="text-decoration:none;" href="<?PHP echo strtolower($row['srname']); ?>.php">
                                <div class="row">
                                    <div class="col-3 "><img src="../img/<?php echo $row['sricon']; ?>" style="width:50px;height:50px;margin-top:22px;" class="" /></div>
                                    <div class="col-5" style="font-size:20px;margin-top:30px;text-decoration: none;color:#0A9FB4;"><?PHP echo $row['srname']; ?></div>
                                </div>
                            </a></div>
                <?PHP }
                } ?>

            </div>
        </div>
    </section>
   
</body>

</html>