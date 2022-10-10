<?PHP
session_start();
if (isset($_SESSION['username'])) {
    header('Location:http://localhost/digital_society/');
}
?><?PHP
    include "config.php";
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/registration.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?PHP include "header.php"; ?>
    <div>
        <div>
            <form id="registration_form">
                <div class="input-container2">
                    <div class="zero_part">
                    <div class="registration_text">REGISTRATION</div>
                        <div class="part">
                            <div class="first_part">
                                <lable for="fname">First Name: </lable>
                                <input type="text" id="fname" name="fname" required><br><br>
                                <lable for="lname">Last Name: </lable>
                                <input type="text" id="lname" name="lname" required><br><br>
                                <lable for="username">Username : </lable>
                                <input type="text" id="username" name="username" required><br><br>
                                <lable for="email">E-Mail : </lable>
                                <input type="email" id="email" name="email" required><br><br>
                                <lable for="mobile">Mobile : </lable>
                                <input type="text" id="mobile" name="mobile" required><br><br>
                                <lable for="password">Password : </lable>
                                <input type="password" id="password" name="password" required><br><br>
                            </div>
                            <div class="second_part">
                                <lable for="role">Role : </lable>
                                <select id="role" required class="role" name="role">
                                    <option>Choose Role</option>
                                    <?PHP
                                    $query1 = "SELECT * FROM role";
                                    $result1 = mysqli_query($connection, $query1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_array($result1)) {

                                            echo "<option value='{$row1['rid']}'>{$row1['rname']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <br><br>
                                <lable for="gender">Gender : </lable>
                                <select id="gender" required class="gender" name="gender">
                                    <option>Choose Gender</option>
                                    <?PHP
                                    $query2 = "SELECT * FROM gender";
                                    $result2 = mysqli_query($connection, $query2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row2 = mysqli_fetch_array($result2)) {

                                            echo "<option value='{$row2['gid']}'>{$row2['gname']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <br><br>
                                <lable for="age">Age : </lable>
                                <input id="age" required type="number" name="age"><br><br>
                                <lable for="house">House No: </lable>
                                <input id="house" required type="text" name="house"><br><br>
                                <lable for="society">society : </lable>
                                <select id="society" required class="society" name="society">
                                    <option>Choose society</option>
                                    <?PHP
                                    $query3 = "SELECT * FROM society";
                                    $result3 = mysqli_query($connection, $query3);
                                    if (mysqli_num_rows($result3) > 0) {
                                        while ($row3 = mysqli_fetch_array($result3)) {

                                            echo "<option value='{$row3['sid']}'>{$row3['sname']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <br><br>
                                <button id="submit" type="submit" class="submit_btn" name="add">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div style="text-align:center;color:green;font-size:15px;font-weight:bold;" class="message"></div>
    <div style="text-align:center;color:red;font-size:15px;font-weight:bold;" class="error-message"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
$("#submit").on("click", function(e){
    e.preventDefault();
    $.post(
        "ajax_file.php",
        $("#registration_form").serialize(),
        function(data){
            if(data == 1){
                $("#registration_form").trigger("reset");
                $(".message").html("Registration Successful Now You Can Login").slideDown("slow");
                $(".error-message").slideUp();
            }else{
                $(".error-message").html("Registration Failed Please Try Again").slideDown("slow");
                $(".message").slideUp();
                console.log(data);
            }
        }
    );
});

});

</script>
  
</body>

</html>