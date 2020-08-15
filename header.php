<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="discription" content="This is an example of meta description. This will often show up in search results.">
  <title></title>
  <link rel="stylesheet" type="text/css"  href="style.css"/>
</head>
<body>
  <div class="wrapper">
    <header>
      <nav class="main-nav">
        <div class="nav-left">
          <!-- <a href="#">
            <img class="logo" src="img/logo.png" alt="website Logo">
          </a> -->
          
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#">PORTFOLIO</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">BLOG</a></li>
          </ul>
        </div>
        
        <div class="nav-right">
          <?php if(isset($_SESSION['userId'])){
                echo '<form action="includes/logout.inc.php" method="post">
                <button class="btn" type="submit" name="logout-submit">Logout</button>
                </form>';
              }else{
                echo '<form action="includes/signin.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username/Email..">
                <input type="password" name="pwd" placeholder="Password..">
                <button class="btn" type="submit" name="login-submit">Login</button>
                </form>
                <a  id="signup" href="signup.php">SignUp</a>';
              }
          ?>
        </div>
      </nav>
          
    </header>    
        
  
      
    
  