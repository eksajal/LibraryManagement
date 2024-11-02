<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a target="_blank" href="https://codevibebd.netlify.app/">CodeVibe Innovations
          &nbsp;&nbsp;
         
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>



  <!------Script to stuck the display in activity area------>

<script>
  window.onload = function() {
      // Restore scroll position after full load
      const scrollPosition = localStorage.getItem('scrollPosition');
      if (scrollPosition) {
          const {
              top,
              left
          } = JSON.parse(scrollPosition);
          window.scrollTo(left, top);
      }
  };

  // Save scroll position before the page unloads
  window.addEventListener('beforeunload', function() {
      const scrollPosition = {
          top: window.scrollY,
          left: window.scrollX
      };
      localStorage.setItem('scrollPosition', JSON.stringify(scrollPosition));
  });
</script>




