<?PHP include "config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/digital_society/") or die("Sorry Something went wrong !!!");
}
?><!DOCTYPE html>
<head>
  <title>Contact us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/contact.css.css">
  <style>
    
#success{
  background-color:lightgreen;
  position:absolute;
  top:0;
  text-align: center;
  width:100%;
  color:black;
}

#error{
  background-color:rgb(255, 101, 101);
  position:absolute;
  top:0;
  text-align: center;
  width:100%;
  color:rgb(0,0,0);
}
  </style>
</head>
<!-- image: url(img/a1.jpg) -->
<body style="background-color:#d3faff;">
<?PHP include "header.php"; ?>
  <br><br><br><br><br><br><br><br>
  <div class="container">
    <form>
      <div style="text-align:center">
        <h1>WELCOME TO <span style="cursor:pointer;color:#0a9fb4"><a style="color:#0a9fb4;text-decoration:none" href="home.php">DIGITAL SOCIETY</a></span></h1>
      </div>
      <label for="fname">Full Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
      <br>
      <label for="email">E-mail</label>
      <input type="text" id="email" name="email" placeholder="Your email">
      <br>
      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      <br>
      <div style="text-align:center"> <button style="background-color:#0a9fb4;color:#fff;text-align:center;border:none;width:fit-content;padding:5px 10px;border-radius:8px;font-size:20px;cursor:pointer" name="submit" id="submit" >Submit</button></div>
    </form>
  </div>
  <div id="success"></div>
  <div id="error"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $("#submit").on("click",function(e){
            e.preventDefault();
            var name = $("#fname").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            if(name == "" || email == "" || subject == ""){
              $("#error").html("Please Enter Valid information").fadeOut(3000);
              
            }else{
            $.ajax({  
              url:"contact-data.php",
              type:"POST",
              data:{name:name,email:email,subject:subject},
              success:function(data){
                if(data == 1){
                  $("#success").html("Message Has Been Sent").slideDown();
                }else{
                  $("#error").html("Message Failed to send"+data).slideDown();
                }
              }
            });
        }
          });
        });
        </script>
</body>

</html>