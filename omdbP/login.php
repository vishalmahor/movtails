<?php
include('includes/database.php');
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style type="text/css">
  .wrapper{
    min-height: 100vh;
    background-color: #171717;
}
</style>
  </head>
  <body>
    <div class = "wrapper">
        <?php
        include('includes/header.php');
        ?>


    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a href="home.php">Forgot Password?</a></div>
        <input type="submit" name="login" value="Login">
        <div class="signup_link">
          Not a member? <a href="authentication/signup.php">SignUp</a>
        </div>
      </form>
    </div>
</div>
  </body>
</html>

<?php

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $check = "SELECT * from user where email = '$email' and password = '$password'";
  $res = mysqli_query($con,$check);
  if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_array($res);
    $_SESSION['id'] = $row['id'];
    echo "<script>alert('Login Success.');window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Something went wrong!');window.location.href='login.php';</script>";
  }
}

?>
