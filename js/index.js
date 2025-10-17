// dom ==>
const rightArrowScroll = document.querySelector(".switches .switch:last-child");
const leftArrowScroll = document.querySelector(".switches .switch:first-child");
const shoesGrid = document.querySelector("#shoes");

const hambi = document.querySelector(".hambi");
const responsiveNav = document.querySelector(".resp-navigation");
const leaveNav = document.querySelector(".close-nav");

// listeners ==>

// hambi
hambi.addEventListener("click", () => {
  responsiveNav.style.display = "flex";
  document.body.classList.toggle("no-scroll");
});
leaveNav.addEventListener("click", () => {
  responsiveNav.style.display = "none";
  document.body.classList.toggle("no-scroll");
});
// scroll arrows
leftArrowScroll.addEventListener("click", () => {
  shoesGrid.scrollBy({ left: -420, behavior: "smooth" });
});

rightArrowScroll.addEventListener("click", () => {
  shoesGrid.scrollBy({ left: 420, behavior: "smooth" });
});
