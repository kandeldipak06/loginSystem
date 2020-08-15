<?php

if(isset($_POST["login-submit"])){
  require "dbh.inc.php";
  $mailuid = $_POST["mailuid"];
  $password = $_POST["pwd"];

  if(empty($mailuid) || empty($password)){
    header("Location: ../index.php?error=emptyfields");
    exit();
  }else{
    $sql ="SELECT * FROM users where uiduser=? OR email=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror2");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        $pwdcheck = password_verify($password, $row['pwdusers']);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        if($hashedPwd == $password.$row['pwdusers']){
          header("Location: ../index.php?error=wrongpwd1".$password.$row['pwdusers']);
          exit();
        }else{
          session_start();
          $_SESSION['userId'] = $row["uiduser"];
          $_SESSION['useremail'] = $row["email"]; 
          header("Location: ../index.php?login=Success");
          exit();  
        }//else{
        //   header("Location: ../index.php?error=wrongpwd2");
        //   exit();
        // }
      }else{
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }

  }


}else{
  header("Location: ../index.php");
  exit();
}




//$2y$10$OefquFW2JPRBn/ADVpCPHOFEppvi8OE53Lch3kpHh9XIm8sNKpMuW