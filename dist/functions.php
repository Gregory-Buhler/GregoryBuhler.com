<?php
/* This will be the function we use to grab and return our header */
function getHeader($name) {
  ob_start();
  include('partials/header.php');
  $buffer=ob_get_contents();
  ob_end_clean();
  return str_replace("%TITLE%",$name,$buffer);
}
?>
