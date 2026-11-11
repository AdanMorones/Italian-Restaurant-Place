<?php 
  include_once 'header.php';
?>

<!-- Page Content -->
<main id="home" class="w3-content" style="max-width:1000px">

<!-- Log in -->
<section id="about" class="w3-padding-64">
<h1 class="w3-center">Log in</h1>
<hr>

<form action="../includes/login.inc.php" method="post">
  <p>
  <input class="w3-input w3-padding-16" type="text" placeholder="Username" required name="Name">
  </p>

  <p>
  <input class="w3-input w3-padding-16" type="password" placeholder="Password" required name="Password">
  </p>

  <p>
  <input class="w3-button w3-light-grey w3-section"
  type="submit" name="submit" value="Log in">
  </p>

</form>

<p>Don't have an account yet?</p>
      <!-- Direct relative link to your registration page inside src/ -->
      <a href="register.php" class="w3-button w3-light-grey w3-border">
        Create an Account
      </a>

<?php
  if (isset($_GET["error"])){
    if($_GET["error"] == "registersuccessful"){
      echo "<p class=errorText >Registration successful! Please log in.</p>";
    }
    if($_GET["error"] == "incorrectusername"){
      echo "<p class=errorText >Incorrect username.</p>";
    }
    if($_GET["error"] == "incorrectpwd"){
      echo "<p class=errorText >Incorrect password.</p>";
    }
    if($_GET["error"] == "none"){
      echo "<p class=errorText >Log in successful.</p>";
    }
  }
?>


</section>
</main>
</div>


<?php 
  include_once 'footer.php';
?>