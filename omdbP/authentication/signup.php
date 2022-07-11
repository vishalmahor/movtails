<?php
include('../includes/database.php');
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/index_style.css">
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
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" style="color:  #fff">Vishal <span style="color: #d4aa11">Mahor</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php" style="color:  #fff">Home</a>
        </li><li class="nav-item">
          <a class="nav-link" aria-current="page" href="../public.php" style="color:  #fff">Playlist</a>
        </li>
        <?php
      if (isset($_SESSION['id'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php" style="color:  #fff">Logout</a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="../login.php" style="color:  #fff">My Account</a>
        </li>
      <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>

    <div class="center">
      <h1>Signup</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Fullname</label>
        </div>
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email Address</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        
        <input type="submit" name="signup" value="Signup">
        <div class="signup_link">
          Already a member? <a href="../login.php">SignIn</a>
        </div>
      </form>
    </div>

  </body>
</html>

<?php

if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $check = "SELECT * from user where email = '$email'";
  $res = mysqli_query($con,$check);
  if (mysqli_num_rows($res) > 0) {
    echo "<script>alert('Email already registered.');window.location.href='signup.php';</script>";
  } else {
    $sql = "INSERT into user (name, email, password) values ('$name', '$email', '$password')";
    $result = mysqli_query($con,$sql);
    if ($result) {
      echo "<script>alert('Account created successfully!');window.location.href='../login.php';</script>";
    } else {
      echo "<script>alert('Something went wrong!');window.location.href='signup.php';</script>";
    }
  }
}

?>