
function toggleMenu() {
    document.getElementById("navMenu").classList.toggle("active");
}


window.addEventListener("load", () => {
    let items = document.querySelectorAll(".auto");

    items.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add("show");
        }, index * 200);
    });
});


function openNearestBranch() {

    alert("جارٍ تحديد أقرب فرع PEUGEOT لك...");

    // لو الجهاز بيدعم تحديد الموقع
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);

    } else {
        // fallback لو الجهاز مش بيدعم GPS
        window.open("https://www.google.com/maps/search/Peugeot+dealership+near+me/", "_blank");
    }

    function success(position) {
        let lat = position.coords.latitude;
        let lon = position.coords.longitude;

        // بحث عن أقرب فرع بيجو بناءً على الموقع الحالي
        let mapURL = `https://www.google.com/maps/search/Peugeot+dealership/@${lat},${lon},14z`;

        window.open(mapURL, "_blank");
    }

    function error() {
        // لو المستخدم رفض السماح أو حصل خطأ
        window.open("https://www.google.com/maps/search/Peugeot+dealership+near+me/", "_blank");
    }
}

