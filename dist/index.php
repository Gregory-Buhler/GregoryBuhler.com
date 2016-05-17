<?php
  include('functions.php');
  echo getHeader('My Work');
 ?>
 <!-- Larger than phone -->
  <div class="container-fluid hidden-xs body">
    <div id="workHolder">
      <div id="GregoryBuhlerHero" class="workHero active">
        <h1>GregoryBuhler.com</h1>
        <h3>From start to finish, hand drawn mockups to the live site you're on now.<br>This website was created using:</h3>
        <h3>Javascript, JQuery, HTML, SASS &amp; PHP</h3>
        <img src="images/works/DevelopmentGregoryBuhler.png"   alt="Image of creation process for GregoryBuhler.com">
      </div>
      <div id="CodePenHero" class="workHero">
        <a href="http://codepen.io/Gregory-Buhler/" target="_blank" rel="nofollow noreferrer">
          <h1 class="nomid">CodePen</h1>
          <img src="images/works/CodePen.jpg" alt="Link to Gregory Buhler's CodePen">
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
    <div id="workSelector">
      <div class="row">
        <div class="col-sm-6 selector" data-work="GregoryBuhlerHero">GregoryBuhler.com</div>
        <div class="col-sm-6 selector" data-work="CodePenHero">Gregory CodePen</div>
      </div>
    </div>
  </div>

  <!-- Phone only -->
  <div class="container-fluid visible-xs workPhone body">
    <div id="gregorybuhler" class="workExample">
      <div class="expand">GregoryBuhler.com</div>
      <div class="expandable">
        <img class="img-responsive" src="images/works/DevelopmentGregoryBuhler.png">
      </div>
    </div>
    <div id="codepen" class="workExample">
      <div class="expand">Code Pen</div>
      <div class="expandable">
        <a href="http://codepen.io/Gregory-Buhler/" target="_blank" rel="nofollow noreferrer">
        <img class="img-responsive" src="images/works/CodePen.jpg">
        </a>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {

      // This will set the height of the relative work object at start and on resize, requires two resizes at start due to scrollbar causing spacing between bottom of workHolder and top of workSelector
      $("#workHolder").height($(".active").height());
      setTimeout(function() {
        $("#workHolder").height($(".active").height());
      }, 1);
      $(window).resize(function() {
        $("#workHolder").height($(".active").height());
      });

      // This will open the chosen work example while hiding others - DESKTOP
      $(".selector").click(function() {
        var id = $(this).data("work");
        var height = $(".active").height();
        $(".workHero").each( function( i, val ) {
          if($(val).attr('id') == id) {
            $(val).fadeIn('slow', function() {
              $(val).addClass("active");
            }); // End fadeIn
          } else {
            $(val).fadeOut('slow', function() {
              $(val).removeClass("active");
            }); // End fadeOUt
          } // End If Else
        }); // End workHero.each
      }); // end Selector click

      // This will open the chosen work example while hiding others - PHONE
      $(".expand").click(function() {
        var id = $(this).parent().attr('id');
        $(".expandable").each(function() {
          if($(this).parent().attr('id') == id) {
            $(this).slideDown('slow');
          } else {
            $(this).slideUp('slow');
          } // End if else on expandable
        }); // End expandable.each
      });// End expand.click
    });// End document.ready
  </script>
<?php
include('partials/footer.php');
?>
