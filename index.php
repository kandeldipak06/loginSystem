<?php
  require "header.php";
?>
  <main>
    <div class="main">
      <?php
        if(isset($_SESSION['userId'])){
          echo "Welcome  ".$_SESSION['userId'];
        }else{
          echo "<p>Winter is comming, so Login ASAP</p>";
        }
      ?>
    </div>
  </main>
<?php
  require "footer.php";
?>