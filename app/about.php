<?php
  include('functions.php');
  echo getHeader('About Me');
 ?>
 <!-- Larger than phone -->
  <div class="container hidden-xs" class="body">
  </div>


  <!-- Phone Only -->
  <div class="container-fluid visible-xs phoneAbout body">
    <h2>A Little About Me</h2>
    <img src="../images/Gregory/SmallGreg.jpg" alt="A picture of Gregory Buhler" class="img-circle img-me">
    <p>My name is Greg, and I believe not only in hard work, but in a joy for what you do as well. I like to make people smile, and I know that doing a good job for others, will more often than not bring a smile to their face.</p>
    <p>The bonus of this feature, is that it translates to my work:</p>
    <ul>
      <li>Working as a contractor with constant communication between my client and myself to ensure a working product that fit their needs.</li>
      <li>The times in customer service where I always put my best foot forward to ensure that the customer left there happy.</li>
      <li>To my many times with many companies creating and updating manuals so that my coworkers would be able to pick up a new position without hassle.</li>
    </ul>
    <div class="aboutMeLinks">
      <a href="resume.pdf" target="_blank" rel="nofollow noreferrer"><< Résumé >></a>
    </div>
  </div>
 <?php
 include('partials/footer.php');
 ?>
