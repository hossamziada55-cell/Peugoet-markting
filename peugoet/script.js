// Scroll effect
window.addEventListener('scroll', function () {
    const logo = document.querySelector('.logo');
    if (window.scrollY > 50) {
        logo.classList.add('shrink');
    } else {
        logo.classList.remove('shrink');
    }
});