<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
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

<div ><p class="working-title">Add User Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<label for="fname">First Name : </label>
<input type="text" name="fname" ><br><br>
<label for="lname">Last Name : </label>
<input type="text" name="lname" ><br><br>
<lable for="username">Username : </lable>
<input type="text" name="username" ><br><br>
<lable for="email">E-Mail : </lable>
<input type="email" name="email"><br><br>
<lable for="mobile">Mobile : </lable>
<input type="text" name="mobile"><br><br>
<lable for="password">Password : </lable>
<input type="password" name="password"><br><br>
<lable for="role">Role : </lable>
<select name="role">
<option>Choose Role</option>
<?PHP 
$query1 = "SELECT * FROM role";
$result1 = mysqli_query($connection, $query1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
        
        echo "<option value='{$row1['rid']}'>{$row1['rname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="gender">Gender : </lable>
<select name="gender">
<option>Choose Gender</option>
<?PHP 
$query2 = "SELECT * FROM gender";
$result2 = mysqli_query($connection, $query2);
if(mysqli_num_rows($result2) > 0){
    while($row2 = mysqli_fetch_array($result2)){
        
        echo "<option value='{$row2['gid']}'>{$row2['gname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="age">Age : </lable>
<input type="number" name="age"><br><br>
<lable for="house">House No: </lable>
<input type="text" name="house"><br><br>

<button type="submit" name="add">Add</button>
<lable for="society">society : </lable>
<select name="society">
<option>Choose society</option>
<?PHP 
$query3 = "SELECT * FROM society";
$result3 = mysqli_query($connection, $query3);
if(mysqli_num_rows($result3) > 0){
    while($row3 = mysqli_fetch_array($result3)){
        
        echo "<option value='{$row3['sid']}'>{$row3['sname']}</option>";
    }
}
?>
</select>
<br><br>
</form>
<?PHP 
if(isset($_POST['add'])){
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
    
    $query = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0 ){
        echo "User Already Exists";
    }
    else{
    echo $query2 = "INSERT INTO user(fname,lname,username,email,mobile,password,role,gender,age,house,society) VALUES('{$fname}','{$lname}','{$username}','{$email}','{$mobile}','{$password}',{$role},{$gender},{$age},'{$house}',{$society})";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/digital_society/admin/user/");
    }
}
}
?>
</body>
</html>