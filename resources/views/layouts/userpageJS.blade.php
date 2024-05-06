<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
crossorigin="anonymous"
></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- for active and not active  -->
<script>
// Get all navigation links
const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

// Add click event listeners to each link
navLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    // Prevent the default behavior of the anchor tag
    // event.preventDefault();

    // Remove the 'active' class from all links
    navLinks.forEach((navLink) => {
      navLink.classList.remove('active');
    });

    // Add the 'active' class to the clicked link
    link.classList.add('active');
  });
});




</script>

