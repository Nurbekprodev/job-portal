document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const navLinks = document.getElementById("nav-links");

  // Toggle mobile menu
  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    hamburger.classList.toggle("toggle");
  });

  // Handle dropdowns on mobile
  const dropdownLinks = document.querySelectorAll("#nav-links > li > a");

  dropdownLinks.forEach(link => {
    link.addEventListener("click", (e) => {
      const dropdown = link.nextElementSibling;
      if (dropdown && dropdown.classList.contains("dropdown")) {
        e.preventDefault();
        dropdown.classList.toggle("active");
      }
    });
  });
});
