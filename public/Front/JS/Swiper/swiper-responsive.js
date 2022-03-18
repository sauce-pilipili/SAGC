const laptopL1440Slider = window.matchMedia("(max-width: 1440px)");
mediaQueriesSliderLaptopL(laptopL1440Slider);

function mediaQueriesSliderLaptopL(laptopL1440Slider) {
  if (laptopL1440Slider.matches) {
    swiperStyle.style.width = "80%";
    swiperStyle.style.margin = "auto";
    swiperStyle.style.marginTop = "125px";
  }
}

const Tablet768Slider = window.matchMedia("(max-width: 768px)");
mediaQueriesSliderTablet(Tablet768Slider);

function mediaQueriesSliderTablet(Tablet768Slider) {
  if (Tablet768Slider.matches) {
    swiperStyle.style.width = "100%";
    swiperStyle.style.margin = "auto";
    swiperStyle.style.marginTop = "125px";
  }
}
