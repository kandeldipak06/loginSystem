<?php

if(isset($_POST["signup-submit"])){

  require "dbh.inc.php";
  $username = $_POST["uid"];
  $email = $_POST["mail"];
  $passsword = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];

  if (empty($username) || empty($email) || empty($passsword) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-z0-9]*$/", $username)){
    header("Location: ../signup.php?error=invalidInput");
    exit();
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup.php?error=invalidEmail&uid=".$username);
    exit();
  }else if(!preg_match("/^[a-zA-z0-9]*$/", $username)){
    header("Location: ../signup.php?error=invalidUsername&mail=".$email);
    exit();
  }else if($passwordRepeat != $passsword){
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }else{
    $sql = "SELECT uiduser FROM users WHERE uiduser=?"; 
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../signup.php?error=sqerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      
      if($resultCheck > 0){
        header("Location: ../signup.php?error=UserTaken&mail=".$email);
        exit();
      }else{
        $sql = "INSERT INTO users (uiduser, email, pwdusers) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup.php?error=sqerror");
          exit();
        }else{
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
}else{
  header("Location: ../signup.php");
  exit();
}
