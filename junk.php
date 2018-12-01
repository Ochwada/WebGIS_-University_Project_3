<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'phpfiles/config.php';
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $myemail = mysqli_real_escape_string($db, $_POST['username']);
      $mypassword = mysqli_real_escape_string($db, $_POST['password']);

      $sql ="SELECT id FROM admin WHERE username = '$myemail' and password = 'mypassword'";
      $result =mysqli_query($db ,$sql);
      $row =mysqli_fetch_array($result , MYSQLI_ASSOC);
      $active =$row['active'];

    }
     ?>
  </body>
</html>
