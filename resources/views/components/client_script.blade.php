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
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetAlert.js') }}"></script>
@if (Session::has('success'))
<script>
showSweetAlert("Success!", "{{ Session::get('success') }}", "success");
</script>
@endif
@if (Session::has('error'))
<script>
showSweetAlert("Sorry!", "{{ Session::get('error') }}", "error");
</script>
@endif
<script>


<script>
document.getElementById("category").addEventListener("change", function() {
 var selectedOption = this.options[this.selectedIndex];
 if (selectedOption.value !== "choose") {
  var selectedValue = selectedOption.value;
  if (selectedValue === "all") {
   var url = "{{ url('/shop') }}"; // Redirect to the URL for showing all products
  } else {
   var url = `{{ url('/shop/brands') }}/${selectedValue}`;
  }
  window.location.href = url;
 }
});
</script>



<script>
//landing page carousel

$(document).ready(function() {
 // Initialize Landing Page Carousel
 var landingPageCarousel = $('#landing-page-carousel');
 landingPageCarousel.owlCarousel({
  items: 1,
  loop: true,
  autoplay: true,
  autoplayTimeout: 3000,
 });

 // Other code specific to the landing page carousel

});

// Product Details Page Carousel
// $(document).ready(function () {
//   var owl = $('.owl-carousel');
//     owl.owlCarousel({
//       items: 4,
//       loop: true,
//       margin: 10,
//       autoplay: true,
//       autoplayTimeout: 3000,
//       autoplayHoverPause: true,
//       nav: true,
//     });
//     $('.play').on('click', function () {
//       owl.trigger('play.owl.autoplay', [1000])
//     })
//     $('.stop').on('click', function () {
//       owl.trigger('stop.owl.autoplay')
//     })
// });

$(document).ready(function() {
 var productDetailsCarousel = $('#product-details-carousel');
 var modal = $('#carousel-modal');
 var modalCarousel = $('#modal-carousel');
 var currentItemIndex = 0;
 var clonedItems = null;

 // Initialize the main Owl Carousel for product details
 productDetailsCarousel.owlCarousel({
  items: 4,
  loop: true,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  // nav: true,
 });

 // Initialize the modal Owl Carousel for manual navigation
 modalCarousel.owlCarousel({
  items: 1,
  loop: true,
  autoplay: false,
  nav: true,
  dots: false,
 });

 // Handle click on a carousel item to open the modal
 productDetailsCarousel.on('click', '.item', function() {
  var itemId = $(this).data('item-id');
  var items = productDetailsCarousel.find('.item');

  items.each(function(index) {
   if ($(this).data('item-id') === itemId) {
    currentItemIndex = index;
    return false;
   }
  });

  // If clonedItems is null, clone the items from productDetailsCarousel
  if (clonedItems === null) {
   clonedItems = items.clone();
  }

  // Clear the modal carousel and add the selected item
  modalCarousel.trigger('replace.owl.carousel', [clonedItems]);

  // Set the current item in the modal carousel
  modalCarousel.trigger('to.owl.carousel', [currentItemIndex, 0, true]);

  // Show the modal
  modal.css('display', 'block');
 });

 // Handle next button click in the modal
 modal.on('click', '.owl-next', function() {
  currentItemIndex++;
  modalCarousel.trigger('to.owl.carousel', [currentItemIndex, 0, true]);
 });

 // Handle previous button click in the modal
 modal.on('click', '.owl-prev', function() {
  currentItemIndex--;
  modalCarousel.trigger('to.owl.carousel', [currentItemIndex, 0, true]);
 });

 // Close the modal when the close button or outside the modal is clicked
 modal.on('click', function(e) {
  if (e.target === modal[0] || $(e.target).hasClass('close')) {
   modal.css('display', 'none');
  }
 });
});



// Common code that doesn't depend on the carousels can stay outside of the above blocks
$(document).ready(function() {
 $("#nav > ul > li.dropdowns").click(function(e) {
  if ($(window).width() > 1400) {
   $(this).parent("ul").parent('div').siblings('div').fadeToggle(150);
   e.preventDefault();
  }
 });

 // Other common code
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


$(document).ready(function() {
 $('#getyear').text(new Date().getUTCFullYear());
});
</script>
