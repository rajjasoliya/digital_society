<?PHP
include "config.php";
   
        $fname= mysqli_real_escape_string($connection, $_POST['fname']);
        $lname= mysqli_real_escape_string($connection, $_POST['lname']);
        $username= mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $mobile= mysqli_real_escape_string($connection, $_POST['mobile']);
        $password= mysqli_real_escape_string($connection, $_POST['password']);
        $role= mysqli_real_escape_string($connection, $_POST['role']);
        $gender= mysqli_real_escape_string($connection, $_POST['gender']);
        $age= mysqli_real_escape_string($connection, $_POST['age']);
        $house= mysqli_real_escape_string($connection, $_POST['house']);
        $society= mysqli_real_escape_string($connection, $_POST['society']);

        $query = "SELECT username FROM user WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "User Already Exists";
        } else {
        $query2 = "INSERT INTO user(fname,lname,username,email,mobile,password,role,gender,age,house,society) VALUES('{$fname}','{$lname}','{$username}','{$email}','{$mobile}','{$password}',{$role},{$gender},{$age},'{$house}',{$society})";
        $result2 = mysqli_query($connection, $query2) or die("Query not executed ");
        }
        if($result2){
            echo 1;
        }else{
            echo 0;
        }
    ?>