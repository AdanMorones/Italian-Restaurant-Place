<?php 
  include_once 'header.php';
?>


<!-- Page Content -->
<main id="home" class="w3-content" style="max-width:1000px">


<!-- About -->
<section id="about" class="w3-padding-64">
<div class="about">
  <img src="../img/about.png" class="aboutImage">
  <div class=" aboutContent">
    <div class="aboutText">
      <h5 class="w3-center">Welcome to</h5>
      <h1 class="w3-center">Mamma Mia</h1>
      <h5 class="w3-center">Italian Restaurant</h5>
      <p class="w3-large w3-center">
      Mamma Mia was founded in 2026 by Adan M., Fiona M., Abdul R., and Ashley R. in the Cole Stem Building in Nacogdoches, Texas.</p>
    </div>
  </div>
</div>

</section>

<!-- Menu -->
<section id="menu">

<div class="w3-padding-large">
  <h1 class="w3-center">Our Menu</h1>

  <div class="menuitems">

    <?php 
      include_once 'menu-display.php';
    ?>
    
  </div>
</div>

</section>

</section>

<hr>
<!-- Contact -->
<section id="contact" class="w3-container w3-padding-64">

<h1>Contact</h1>
<p>We offer full-service catering for any event, large or small.</p>

<p class="w3-text-blue-grey w3-large">
<b>Catering Service, 1720 Clark Blvd, Nacogdoches, TX 75965</b>
</p>

<p>
You can also contact us by phone (936)123-4567 or email
SfaMammaMiacatering@sfasu.com, or send us a message here: Instagram: @MammaMiaSfa
</p>

<form action="/action_page.php" target="_blank">
<p>
<input class="w3-input w3-padding-16"
type="text" placeholder="Name" required name="Name">
</p>

<p>
<input class="w3-input w3-padding-16"
type="number" placeholder="How many people" required name="People">
</p>

<p>
<input class="w3-input w3-padding-16"
type="datetime-local" required name="date">
</p>

<p>
<input class="w3-input w3-padding-16"
type="text" placeholder="Message / Special requirements"
required name="Message">
</p>

<p>
<button class="w3-button w3-light-grey w3-section"
type="submit">SEND MESSAGE</button>
</p>

</form>
</section>

</main>

<?php 
  include_once 'footer.php';
?>