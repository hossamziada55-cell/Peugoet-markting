// NAVBAR SCROLL
window.addEventListener("scroll", function () {
    let navbar = document.getElementById("navbar");
    navbar.classList.toggle("scrolled", window.scrollY > 50);
});

// HAMBURGER
const hamburger = document.getElementById("hamburger");
const mobileMenu = document.getElementById("mobileMenu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("active");
    mobileMenu.classList.toggle("active");
});

// FILTER POPUP
const openFilter = document.getElementById("openFilter");
const closeFilter = document.getElementById("closeFilter");
const popup = document.getElementById("filterPopup");

openFilter.addEventListener("click", () => popup.style.display = "flex");
closeFilter.addEventListener("click", () => popup.style.display = "none");

function filterCars(type) {
    let cards = document.querySelectorAll(".car-card");
    cards.forEach(card => {
        if (type === "all") {
            card.style.display = "block";
        } else {
            card.style.display =
                card.getAttribute("data-type") === type
                    ? "block" : "none";
        }
    });
    popup.style.display = "none";
}