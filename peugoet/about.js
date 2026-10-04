window.addEventListener("scroll", function () {
  let navbar = document.getElementById("navbar");
  navbar.classList.toggle("scrolled", window.scrollY > 50);
});

const hamburger = document.getElementById("hamburger");
const mobileMenu = document.getElementById("mobileMenu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("active");
  mobileMenu.classList.toggle("active");
});
