<?PHP
session_start();
if (isset($_SESSION['username'])) {
    header('Location:http://localhost/digital_society/home.php');
}
include "config.php" ?>
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

        <?PHP include "header.php";?>
            <div>
                <form class="login-form" method="POST" action="<?PHP $_SERVER['PHP_SELF'] ?>">
                    <h2>Sign In</h2><br>
                    <div class="input-container">
                        <lable>Username</lable>
                        <input type="text" name="username"><br><br><br>
                    </div>
                    <div class="input-container">
                        <lable>Password</lable>
                        <input type="password" name="password"><br><br>
                    </div><button type="submit" class="btn" name="login">Log in</button><a style="text-decoration: none;" href="registration.php" type="button" class="btn">Registration</a>
                </form>
                <?PHP
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = $_POST['password'];
                    $query = "SELECT id,username,role,fname,lname FROM user WHERE username = '$username' AND password = '$password'";
                    $result = mysqli_query($connection, $query) or die("sorry");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION['fname'] = $row['fname'];
                            $_SESSION['lname'] = $row['lname'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['user_id'] = $row['id'];
                            $_SESSION['user_role'] = $row['role'];
                        //     if($_SESSION['user_role'] == 1){
                        //         header('Location:http://localhost/digital_society/admin');
                        //     }else{
                            header('Location:http://localhost/digital_society/home.php');
                        // }
                    }
                    } else {
                        echo "<div id='incorrect' class='incorrect'>Incorrect Username or Password</div>";
                    }
                }
                ?>
            </div>
        <div class="newarrivals">WELCOME TO</div>
        <div class="SUMMER">DIGITAL SOCIETY</div>
        <div class="summerdesc">Our latest collection of apparel in breezy styles and a refreshing colour palette including Aqua, lime and coral tones. Attention to fine details in silhouettes, bold geometrics and soft floral prints on cool cottons and silk blends make this collection a must have for you this season. Take a look now!</div>
        <button class="shopnow"> Read More</button>
    </section>

    <!-- End Header Code-->
    <script type="text/javascript">
    </script>
</body>

</html>