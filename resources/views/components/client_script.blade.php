<!-- script section section start  -->
  <!-- bootstrap css1 js1 -->
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('bootstrap/js/proper.min.js') }}"></script>
  <!-- <script src="./vendor/bootstrap/js/bootstrap.min.js"></script> -->

  <!-- jquery -->
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

  <!-- owl carousel  -->
  <script src="{{ asset('owl-carousel/js/owl.carousel.min.js') }}"></script>

  <!-- custom js -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- script section section end  -->

  <script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 4,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
    });
    $('.play').on('click', function () {
      owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function () {
      owl.trigger('stop.owl.autoplay')
    })

    $(document).ready(function () {
      $(" #nav > ul > li.dropdowns").click(function (e) {
        if ($(window).width() > 1400) {
          $(this).parent("ul").parent('div').siblings('div').fadeToggle(150);
          e.preventDefault();
        }
      });
    });

    // Get the input element
    const numberInput = document.getElementById("numberInput");

    // Function to decrease the value
    function decreaseValue() {
      if (numberInput.value > 1) {
        numberInput.value--;
      }
    }

    // Function to increase the value
    function increaseValue() {
      if (numberInput.value < 10) {
        numberInput.value++;
      }
    }

    document.addEventListener("DOMContentLoaded", function () {
      // Reference to your carousel element
      var myCarousel = document.getElementById('carouselExampleIndicators');

      // Create a function to advance the carousel to the next slide
      function nextSlide() {
        var carousel = new bootstrap.Carousel(myCarousel);
        carousel.next();
      }

      // Set an interval to automatically advance the carousel every 2 seconds
      var carouselInterval = setInterval(nextSlide, 3000);

      // Pause the carousel when the mouse hovers over it
      myCarousel.addEventListener('mouseenter', function () {
        clearInterval(carouselInterval);
      });

      // Resume the carousel when the mouse leaves it
      myCarousel.addEventListener('mouseleave', function () {
        carouselInterval = setInterval(nextSlide, 3000);
      });
    });

    $(document).ready(function () {
      $('#getyear').text(new Date().getUTCFullYear());
    });
  </script>