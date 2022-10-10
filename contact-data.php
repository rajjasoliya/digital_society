<?PHP
  include "config.php";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['subject'];
$query = "INSERT INTO contact(cname, cemail, cmessage) VALUES('{$name}', '{$email}','{$message}')";
$result = mysqli_query($connection, $query) or die("sorry");
if ($result) {
    echo 1;
}else{
  echo $query+"<br><br><br>"+$result;
}
?>
