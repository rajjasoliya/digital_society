<?PHP include "config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/digital_society/") or die("Sorry Something went wrong !!!");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!--Header Code-->
    <section id="header">
        <div>
            <img src="img/c1.jpg" class="center-img">
        </div>
        <?PHP
        include "header.php";
        ?>
        <div class="newarrivals">WELCOME TO</div>
        <div class="SUMMER">DIGITAL SOCIETY</div>
        <div id="demo" class="summerdesc">Our latest collection of apparel in breezy styles and a refreshing colour palette including Aqua, lime and coral tones. Attention to fine details in silhouettes, bold geometrics and soft floral prints on cool cottons and silk blends make this collection a must have for you this season. Take a look now!</div>
        <button class="shopnow" id="read_btn"> Read More</button>
    </section>
    <!-- End Header Code-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#read_btn").on("click",() => {
            console.log("clicked");
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = () => {
        //         if(xhttp.readyState == 4 && xhttp.status == 200) {
        //             console.log(xhttp.responseText);
        //             $("#demo").html = xhttp.responseText;
        //             // $("#read_btn").style.display = "none";
        //         }
        //         if(xhttp.status == 404){
        //             $("#read_btn").html = "404 not found";
        //         }
        //     };
        //     xhttp.open("GET", "/content/home.txt", true);
        //     xhttp.send();
        });
    });
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(() => {
        const load = () => {
            $.ajax({
                url : "home.txt",
                type : "GET",
                success:(data) => {
                    $("#demo").html(data);
                    
                }
            });}
        $("#read_btn").on("click",function(e){
            e.preventDefault();
            console.log("clicked");
            load();
        });
    });
    </script> -->
</body>
</html>
