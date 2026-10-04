const menuIcon = document.getElementById("menuIcon");
const navLinks = document.getElementById("navLinks");

menuIcon.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

document.querySelectorAll(".slider").forEach(slider => {

    let slides = slider.querySelectorAll(".slide");
    let index = 0;

    let prev = slider.querySelector(".prev");
    let next = slider.querySelector(".next");

    function show(i){
        slides.forEach(s => s.classList.remove("active"));
        slides[i].classList.add("active");
    }

    function nextSlide(){
        index++;
        if(index >= slides.length) index = 0;
        show(index);
    }

    function prevSlide(){
        index--;
        if(index < 0) index = slides.length - 1;
        show(index);
    }

    if(slides.length > 0){
        show(index);

        // تلقائي كل 5 ثواني
        setInterval(nextSlide, 5000);

        // الأسهم
        if(next) next.onclick = nextSlide;
        if(prev) prev.onclick = prevSlide;
    }

});