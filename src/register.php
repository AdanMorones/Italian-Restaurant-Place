<?php 
  include_once 'header.php';
?>

<!-- Page Content -->
<main id="home" class="w3-content" style="max-width:1000px">

<!-- Register -->
<section id="about" class="w3-padding-64">
<h1 class="w3-center">Register</h1>
<hr>

<form action="../includes/register.inc.php" method="post">
  <p>
  <input class="w3-input w3-padding-16"
  type="text" placeholder="Username" required name="Name">
  </p>

  <p>
  <input class="w3-input w3-padding-16"
  type="password" placeholder="Password"
  required name="Password" title="At least 1 digit, 1 uppercase, 1 lowercase, 1 special character, and minimum 8 characters long"
  pattern="(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&]).{8,}">
  </p>

  <p>
  <input class="w3-input w3-padding-16"
  type="email" placeholder="Email" required name="Email">
  </p>

  <p>
  <input class="w3-button w3-light-grey w3-section"
  type="submit" name="submit" value="Register">
  </p>

</form>

<?php
  if (isset($_GET["error"])){
    if($_GET["error"] == "userexists"){
      echo "<p class=errorText >Username is already in use.</p>";
    }
    if($_GET["error"] == "stmtfailed"){
      echo "<p class=errorText >Something went wrong, please try again.</p>";
    }
  }
?>


</section>
</main>
</div>

<?php 
  include_once 'footer.php';
?>
