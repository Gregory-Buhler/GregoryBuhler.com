<?php
  include('functions.php');
  echo getHeader('My Work');
 ?>
 <!-- Larger than phone -->
  <div class="container hidden-xs" class="body">
    Testing
  </div>

  <!-- Phone only -->
  <div class="container-fluid visible-xs workPhone">
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
<?php
include('partials/footer.php');
?>
