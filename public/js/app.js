import './bootstrap';

// nav bar section start

$(document).ready(function(){
    $('.navbuttons').click(function(){
        $('.navbuttons').toggleClass('crossxs');
    });
});

// dropdown menu section start
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

// dropdown menu section end


// for navbar link
// Get all elements with the class "myLink"
var linkElements = document.getElementsByClassName("myshop");
  
// Attach a click event listener to each element
for (var i = 0; i < linkElements.length; i++) {
  linkElements[i].addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default behavior (opening the modal)
    window.location.href = this.getAttribute("href"); // Manually navigate to the href URL
  });
}


// navbar section end

// footer section start
$(document).ready(function () {
    $('#getyear').text(new Date().getUTCFullYear());
  });

//   footer section end
