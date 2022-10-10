<?PHP 
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['user_role'] == 2){
        header('Location:http://localhost/digital_society/');
    }
}

include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table{
        text-align: center;
        position:absolute;
        top:55%;
        left:50%;
        transform:translate(-50%, -50%);
        padding:20px;
        border:2px solid black;
        }
        th{
            color: #fff;
            background-color: #cba;
            padding:5px;
            border-radius: 5px;
        }
        button{
            border:none;
            background-color: #acb;
            border-radius: 5px;
            padding: 5px;
        }
        button a{
            font-size:18px;    
            color:#fff;
            text-decoration: none;
        }
        .add-user{
            text-decoration: none;
            background-color: #ccc;
            color: #fff;
            font-weight: 600;
            padding: 10px;
            float:center;
            margin-left:50%;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <caption><a href="add-user.php" class="add-user">Add User</a></caption>
    <table width="100%" cellspacing="25">
    <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Mobile</th>
            <th>Password</th>
            <th>Role</th>
            <th>Gender</th>
            <th>Age</th>
            <th>House No.</th>
            <th>Society</th>
            <th>Edit</th>
            <th>Delete</th>
    </tr>
<?PHP include "config.php";
$query="SELECT * FROM user INNER JOIN gender ON user.gender = gender.gid INNER JOIN role ON user.role = role.rid INNER JOIN society ON user.society = society.sid";
$result=mysqli_query($connection,$query) or die("error in query");
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result)){ ?>
    <tr>
            <td><?php echo $row['id'];?></td> 
            <td><?php echo $row['fname']."_".$row['lname'];?></td> 
            <td><?php echo $row['username'];?></td> 
            <td><?PHP echo $row['email']; ?></td> 
            <td><?PHP echo $row['mobile'];?></td>
            <td><?php echo md5($row['password']);?></td> 
            <td><?php echo $row['rname'];?></td> 
            <td><?php echo $row['gname'];?></td> 
            <td><?php echo $row['age'];?></td> 
            <td><?php echo $row['house'];?></td> 
            <td><?PHP echo $row['sname'];?></td> 
            <td><button ><a href="edit-user.php?id=<?php echo $row['id'];?>">Edit</a></button></td>
            <td><button><a href="delete-user.php?id=<?php echo $row['id'];?>">Delete</a></button></td>
</tr>
<?PHP } }?>
</table>
</body>
</html>