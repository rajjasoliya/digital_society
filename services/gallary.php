<?PHP include "../config.php";session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!--Header Code-->
    <section id="header">
        <?PHP 
        include "header.php";
        ?>
        
    </section>
    <div class="container" style="margin-top: 150px;">
        <div class="row">
        <?PHP 
            
            $query = "SELECT * FROM gallary";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                        
            ?>
            <div class="col-4">            
                   <div style="border-radius:25px;"  class="card container-overlay">
                    <img src="../img/<?PHP echo $row['gimage']; ?>" class="card-img-top image">
                    <div class="card-title overlay"><?PHP echo $row['gfestival'] ?></div>
                </div>
            </div>
            <?PHP
                }
            }
            ?> 
            
    <!-- End Header Code-->
    <script type="text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>