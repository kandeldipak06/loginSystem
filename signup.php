<?php
  require "header.php";
?>

    <main>
      <div class="signupform">
        <h1> SignUp</h1>
        <?php
          if(isset($_GET['error'])){
            if($_GET['error']== "emptyfields"){
              echo "<p> Fill in all the fields</p>";
            }else if($_GET['error']== "passwordcheck"){
              echo "<p> password does not match</p>";
            }
          }
        ?>
        <form action = "includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="text" name="mail" placeholder="Email..">
          <input type="password" name="pwd" placeholder= "Password">
          <input type="password" name="pwd-repeat" placeholder= "Repeat Password">
          <button class="btn" type="submit" name="signup-submit">Signup</button>

        </form>
      </div>
    </main>

<?php
  require "footer.php";
?>