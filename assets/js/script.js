const preloader = document.querySelector(".preloader");

window.addEventListener("load", () => {
  setTimeout(() => {
    preloader.classList.add("hide-loader");
  }, 1000);
});
