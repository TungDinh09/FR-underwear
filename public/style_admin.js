

const btn_active = document.querySelector(".btn-active");
const btn_active_phone = document.querySelector("#btn-active-phone");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".main");

btn_active.addEventListener("click", () => {
    sidebar.classList.toggle('sidebar-active');
    main.classList.toggle('main-active');
});
btn_active_phone.addEventListener("click", () => {
    sidebar.classList.toggle('sidebar-active');
    main.classList.toggle('main-active');
});