<?php
  include('functions.php');
  echo getHeader('About Me');
 ?>
 <!-- Larger than phone -->
  <div class="container-fluid hidden-xs desktop body">
    <h2>A Little About Me</h2>
    <div class="row">
      <div class="col-sm-12">
        <p>I'm Greg, and many people who know me on a personal level would go as far as to call me a dreamer. I like to imagine, I like to test the boundaries of what I know, and I like to have fun doing it. As my uncle once said, "Take two Greg's a day to beat any blues." I love to see people smile and I work hard to make it happen.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5 listMe">
        <p>The bonus of this feature, is that it translates to my work:</p>
        <ul>
          <li>Working as a contractor with constant communication between my client and myself to ensure a working product that fit their needs.</li>
          <li>The times in customer service where I always put my best foot forward to ensure that the customer left there happy.</li>
          <li>To my many times with many companies creating and updating manuals so that my coworkers would be able to pick up a new position without hassle.</li>
        </ul>
      </div>
      <div class="col-sm-6">
        <div id="pictureChanger">
          <img id="image1" class="gregImage active" src="images/Gregory/Gregory1.jpg">
          <img id="image2" class="gregImage" src="images/Gregory/Gregory2.jpg">
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-sm-12">
        <p>I believe that a person should be proud of their abilities and work. Because of this I can say I am confident that I can help you with any of the following:</p>

        <p>JQuery, Javascript, HTML, CSS, PHP, and a few different Content Management Systems as well as databases.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 aboutMeLinks">
        <a href="resume.pdf" rel="nofollow noreferrer"><< Résumé >></a>
      </div>
    </div>
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
      <a href="resume.pdf" rel="nofollow noreferrer"><< Résumé >></a>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      var images = []; // Set up array to hold image ids
      var imagesCurrent = 0; // Counter for images
      $("#pictureChanger").height($("#image1").height() + 50);
      setTimeout(function() {
        $("#pictureChanger").height($("#image1").height() + 50);
      }, 1);
      $(window).resize(function() {
        $("#pictureChanger").height($("#image1").height() + 50);
      });
      $(".gregImage").each(function(i) {
        images.push("image" + (i+1)); // Run through images and put into the array
      }); // end gregImage.each
      $("#pictureChanger").click(function() {
        // animate next image to top
        $("#" + images[imagesCurrent]).removeClass("active");
        if((imagesCurrent + 1) < images.length) { //increment
          imagesCurrent = imagesCurrent + 1;
        } else { // check to see if end of array, if it is, set counter to 0
          imagesCurrent = 0;
        } // End if else
        $("#" + images[imagesCurrent]).addClass("active");
      }); // end pictureChanger.click
    });
  </script>
 <?php
 include('partials/footer.php');
 ?>
