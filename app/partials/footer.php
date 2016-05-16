      <footer>
        Copyright Gregory Buhler &copy; 2016
      </footer>
    </div>
    <!--build:js js/main.min.js-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--endbuild-->
    <script>
      $(document).ready(function() {
        $(".expand").click(function() {
          $(this).parent().children(".expandable").slideToggle('slow');
        });
      });
    </script>
  </body>
</html>
