<?PHP  
include "config.php";

session_start();
session_unset();
session_destroy();
header("Location:http://localhost/digital_society/") or die("Error in Log out");

?>