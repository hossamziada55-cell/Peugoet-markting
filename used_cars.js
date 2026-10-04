// 💡 تحسين بسيط: حفظ الفلاتر بعد الريفريش
const params = new URLSearchParams(window.location.search);

document.querySelectorAll(".filter-box input").forEach(input => {
    if(params.has(input.name)){
        input.value = params.get(input.name);
    }
});