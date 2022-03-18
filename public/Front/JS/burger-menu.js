const body = document.querySelector("body");
const burgerMenu = document.querySelector(".burger_menu");
const toggleMenuList = document.querySelector(".toggle_menu_list");
const menu = document.querySelector("#menu");

const burgerBar1 = document.querySelector("#bar-1");
const burgerBar2 = document.querySelector("#bar-2");
const burgerBar3 = document.querySelector("#bar-3");

let clickedEvent = "click";
window.addEventListener(
  "touchstart",
  function detectTouch() {
    clickedEvent = "touchstart";
    window.removeEventListener("touchstart", detectTouch, false);
  },
  false
);

burgerMenu.addEventListener(
  clickedEvent,
  function (evt) {
    console.log(burgerMenu);
    if (menu.getAttribute("class") != "visible") {
      menu.setAttribute("class", "visible");

      body.style.overflowY = "hidden";
      body.style.overflowx = "hidden";

      burgerMenu.style.zIndex = "5";

      burgerBar1.style.transform = "rotate(-45deg) translate(-10px, 8px)";

      burgerBar2.style.opacity = "0";
      burgerBar2.style.transition = "0.2s";

      burgerBar3.style.transform = "rotate(45deg) translate(-8px, -8px)";
      burgerBar3.style.width = "45px";
      burgerBar3.style.transition = "0.5s";
    } else {
      menu.setAttribute("class", "invisible");

      burgerBar1.style.transform = "rotate(0) translate(0, 0)";
      burgerBar1.style.transition = "0.5s";

      burgerBar2.style.opacity = "1";
      burgerBar2.style.transition = "0.2s";

      burgerBar3.style.transform = "rotate(0deg) translate(0, 0)";
      burgerBar3.style.width = "24.76px";
      burgerBar3.style.transition = "0.5s";

      body.removeAttribute("style");
    }
  },
  false
);
