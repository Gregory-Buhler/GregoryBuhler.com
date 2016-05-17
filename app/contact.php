<?php
  include('functions.php');
  echo getHeader('Contact Me');
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    function check_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $myemail  = "Gregory@GregoryBuhler.com";
    $name     = filter_var(check_input($_POST["name"]), FILTER_SANITIZE_EMAIL);
    $email    = filter_var(check_input($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject  = "Email From GregoryBuhler.com";
    $message  = filter_var(check_input($_POST["message"]), FILTER_SANITIZE_EMAIL);

    $str = "
    Name: $name
    Email: $email
    Message: $message
    End of Message";
    mail($myemail, $subject, $str);
    ?>
    <script>
      $(document).ready(function() {
        $("#alert").addClass("alert-success");
        $("#alert").html("<p>Your message was sent successfully</p>");
        $("#alert").slideDown('slow', function() {
          setTimeout(removeAlert, 4000);
        });
      });
    </script>
    <?php
  }
 ?>
 <div id="alert" class="alert">
 </div>
<!-- Desktop Only -->
<div class="container-fluid hidden-xs desktop body">
  <h2>Contact Me</h2>
  <div class="row">
    <div class="col-sm-4">
      <label> Call Me:</label>
      <a class="contactButton" href="tel:5879861869">(587) 986-1869</a>
      <label>Email Me:</label>
      <a class="contactButton" href="mailto:Gregory@GregoryBuhler.com" rel="nofollow noreferrer">Gregory@GregoryBuhler.com</a>
    </div>
    <div class="col-sm-6 col-sm-offset-2">
      <form name="contactForm" action="contact.php" onsubmit="return validateForm();" method="post">
        <div class="form-group">
          <label>Name:</label>
          <input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input id="email" name="email" type="email" placeholder="Email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Message:</label>
          <textarea id="message" name="message" class="form-control" rows="3" required></textarea>
        </div>
        <button class="btn contactButton" type="submit" required>Send the Message</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
    </div>
  </div>

</div>

 <!-- Phone only -->
 <div class="container-fluid visible-xs contactPhone body">
   <div class="row">
     <div class="col-xs-10 col-xs-offset-1">
       <h2>Contact Me</h2>
       <label> Call Me:</label>
       <a class="contactButton" href="tel:5879861869">(587) 986-1869</a>
       <label>Email Me:</label>
       <a class="contactButton" href="mailto:Gregory@GregoryBuhler.com" rel="nofollow noreferrer">Gregory@GregoryBuhler.com</a>
       <form name="contactFormPhone" action="contact.php" onsubmit="return validateForm();" method="post">
         <label>Send a Message</label>
         <div class="form-group">
           <label>Name:</label>
           <input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
         </div>
         <div class="form-group">
           <label>Email:</label>
           <input id="email" name="email" type="email" placeholder="Email" class="form-control" required>
         </div>
         <div class="form-group">
           <label>Message:</label>
           <textarea id="message" name="message" class="form-control" rows="3" required></textarea>
         </div>
         <button class="btn contactButton" type="submit" required>Send the Message</button>
       </form>
    </div>
   </div>
 </div>
<script>
  // Check email domain
  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  // Remove alert box
  function removeAlert() {
    $("#alert").slideUp('slow', function() {
      $("#alert").removeClass('alertDanger');
      $("#alert").html("");
    });
  }

  // Check through the mail form
  function validateForm(e) {
    $("#alert").removeClass('alert-danger');
    $("#alert").removeClass('alert-success');
    $("#alert").html("");
    // Set errors array
    var errors = [];

    // Get the name value and trim
    var name = $.trim($("#name").val());
    // Get the email value and trim
    var email = $.trim($("#email").val());
    // Get the message value and trim
    var message = $.trim($("#message").val());
    // Check if errors
    if (name.length < 2) {
      errors.push("You're name must be more than 1 letter");
    }
    if (!validateEmail(email)) {
      errors.push("You're email is invalid");
    }
    if (message.length < 6) {
      errors.push("You're message must be 6 letters or longer");
    }

    if(errors.length > 0) {
      $("#alert").addClass('alert-danger');
      $("#alert").append("<ul>");
      errors.forEach(function(err) {
        $("#alert").append("<li>" + err + "</li>");
      });
      $("#alert").append("</ul>");
      $("#alert").slideDown('slow', function() {
        setTimeout(removeAlert, 4000);
      });
      return false;
    }
  };
</script>
 <?php
 include('partials/footer.php');
 ?>
