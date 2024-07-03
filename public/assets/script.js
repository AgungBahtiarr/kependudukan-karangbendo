// Toggle class active
const navbarNav = document.querySelector(".nav");
// when click menu
document.querySelector("#menu").onclick = () => {
    navbarNav.classList.toggle("active");
};

// Click out of slidebar for hidden navbar
// const menu = document.querySelector("#menu");
// document.addEventListener("click", function (e) {
//     if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
//         navbarNav.classList.remove("active");
//     }
// });
