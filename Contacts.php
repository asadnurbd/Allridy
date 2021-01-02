<?php
  if (isset($_POST['send'])) {
  if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['sub'])&& isset($_POST['mass'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['sub'];
  $mass=$_POST['mass'];

  $mailTo="nurbdsquar@gmail.com";
  $txt=$name."\n".$mass;
  mail($mailTo,$subject,$txt,$email);
  header("Location: Contacts.php?mailsend");
}

if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['sub']) && empty($_POST['mass'])) {
  $email=$_POST['email'];
  if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo $emailErr;
      }
      header("Location: C.php?mailerror");
}




  }



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Contacts</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/drowpdown.css">
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">

</head>
<body>
  <?php
    include 'header.php';
  ?>


</header>"
<div class="main">

  <section id="content">
    <div class="container_12">
      <div class="grid_4 bot-1">
        <h2 class="top-6">Contact Us</h2>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2914.0116243630614!2d90.43285261429787!3d23.7889354932216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7c04bd74f81%3A0x96a565223dddb8a!2sSatarkul+Rd%2C+Dhaka%2C+Bangladesh!5e1!3m2!1sen!2sus!4v1534179495842" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <dl>
          <dt>Main Campus (KGII-A Level): <br>
               United City, Satarkul, <br>
               Dhaka-1212, Bangladesh., <br>
               Glasgow, D04 89GR.</dt>
          <dd><span>phone: </span>+08801764766614</dd>
          <dd><span>E-mail: </span><a href="#" class="link">nur.cse.uiu@gmail.com</a></dd>
        </dl>
      </div>
      <div class="grid_8">
        <div class="block-1 top-5">
          <div class="block-1-shadow">
            <h2 class="clr-6">Contact Form</h2>
            <form id="form"action="" method="post" >
              <fieldset>
                <label><strong>Name:</strong>
                  <input type="text" name="name">
                  <strong class="clear"></strong></label>
                <label><strong>Email:</strong>
                  <input type="text" name="email">
                  <strong class="clear"></strong></label>
                <label><strong>Subject:</strong>
                  <input type="text" name="sub">
                  <strong class="clear"></strong></label>
                <label><strong>Message:</strong>
                  <textarea name="mass"></textarea>
                  <strong class="clear"></strong></label>
                 <button style="color:gray;height:80px;  font-size: 40px;" type="submit" name="send">send</button>
              </fieldset>
            </form>
          </div>
        </div>
        <!--==============================footer=================================-->
        <footer>
          <p1>car allridy system <a href="www.google.com">http://nurbdsquar.comli.com</a></p1>
        </footer>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>
</body>
</html>
