document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("send.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {

            if (data.trim() === "success") {
                document.getElementById("popup").style.display = "flex";
                document.getElementById("contactForm").reset();
            } else {
                alert("حدث خطأ… حاول مرة اخرى.");
            }

        });
});

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

function toggleMenu() {
    document.querySelector(".nav-links").classList.toggle("active");
    document.getElementById('mobile-menu').classList.toggle('active');
}

