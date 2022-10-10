<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/digital_society/admin');
}
?><?PHP 
include "config.php";
$id = $_GET['id'];
echo $query = "DELETE FROM user WHERE id = {$id} ";
$result = mysqli_query($connection,$query) or die("Error in Deleting Record");
header("Location:http://localhost/digital_society/admin/user/");
?>
