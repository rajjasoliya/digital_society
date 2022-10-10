<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/digital_society/admin');
}
?><?PHP 
include "header.php";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
form{
        position:absolute;
        top:55%;
        left:50%;
        transform:translate(-50%, -50%);
        padding:20px;
        border:2px solid black;
    }
    button,select,input{
        padding:5px;
        font-size: 17px;
        border:2px solid black;
        border-radius:3px;
    }
    .working-title{
        border:2px solid black;
        background:#ccc;
        color:#fff;
        padding:10px;
        text-align: center;
        font-weight: 600;
    }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div ><p  class="working-title">Edit User Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<?PHP 
$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    
?>
<label for="fname">First Name : </label>
<input type="text" name="fname"  value="<?php echo $row['fname']; ?>"><br><br>
<label for="lname">Last Name : </label>
<input type="text" name="lname"  value="<?php echo $row['lname']; ?>"><br><br>
<lable for="username">Username : </lable>
<input type="text" name="username"  value="<?php echo $row['username']; ?>"><br><br>
<lable for="email">E-Mail : </lable>
<input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
<lable for="mobile">Mobile : </lable>
<input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>
<lable for="password">Password : </lable>
<input type="password" name="password" value="<?php echo $row['password']; ?>"><br><br>
<lable for="role">Role : </lable>
<select name="role">
<?PHP 
$query1 = "SELECT * FROM role";
$result1 = mysqli_query($connection, $query1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
        if($row['role'] == $row1['rid']){
            $select = "selected";
        }
        else{
            $select = "";
        }
        echo "<option {$select} value='{$row1['rid']}'>{$row1['rname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="gender">Gender : </lable>
<select name="gender">
<?PHP 
$query2 = "SELECT * FROM gender";
$result2 = mysqli_query($connection, $query2);
if(mysqli_num_rows($result2) > 0){
    while($row2 = mysqli_fetch_array($result2)){
        if($row['gender'] == $row2['gid']){
            $select = "selected";
        }
        else{
            $select = "";
        }
        echo "<option {$select} value='{$row2['gid']}'>{$row2['gname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="age">Age : </lable>
<input type="number" name="age" value="<?PHP echo $row['age'] ?>"><br><br>
<lable for="house">House No: </lable>
<input type="text" name="house" value="<?PHP echo $row['house'] ?>"><br><br>
<lable for="society">society : </lable>
<select name="society">
<?PHP 
$query3 = "SELECT * FROM society";
$result3 = mysqli_query($connection, $query3);
if(mysqli_num_rows($result3) > 0){
    while($row3 = mysqli_fetch_array($result3)){
        if($row['society'] == $row3['sid']){
            $select = "selected";
        }
        else{
            $select = "";
        }
        echo "<option {$select} value='{$row3['sid']}'>{$row3['sname']}</option>";
    }
}
?>
</select>
<br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $fname = mysqli_real_escape_string($connection,$_POST['fname']);
    $lname = mysqli_real_escape_string($connection,$_POST['lname']);
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $mobile = mysqli_real_escape_string($connection,$_POST['mobile']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $role = mysqli_real_escape_string($connection,$_POST['role']);
    $gender = mysqli_real_escape_string($connection,$_POST['gender']);
    $age = mysqli_real_escape_string($connection,$_POST['age']);
    $house = mysqli_real_escape_string($connection,$_POST['house']);
    $society = mysqli_real_escape_string($connection,$_POST['society']);
    
    $query2 = "UPDATE user SET fname = '$fname',lname = '$lname',username = '$username',email = '$email',mobile = '$mobile',password = '$password',role = '$role',gender = '$gender',age = '$age', house = '$house' , society = '$society' WHERE id = {$id};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/digital_society/admin/user/");
    }
}
?>
</body>
</html>