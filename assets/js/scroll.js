let scrollContainer = document.querySelector(".card-collection");
let scrollContainers = document.querySelector("#cardCollection");
let left = document.querySelector(".left");
let right = document.querySelector(".right");
// let left = document.getElementById("left")
// let right = document.getElementById("right")
let leftside = document.getElementById("leftside");
let rightside = document.getElementById("rightside");

scrollContainer.addEventListener("wheel", (e) => {
  e.preventDefault();

  scrollContainer.scrollLeft += e.deltaY;
  scrollContainer.style.scrollBehavior = "auto";
});

left.addEventListener("click", () => {
  scrollContainer.style.scrollBehavior = "smooth";
  scrollContainer.scrollLeft -= 800;
});
right.addEventListener("click", () => {
  scrollContainer.style.scrollBehavior = "smooth";
  scrollContainer.scrollLeft += 900;
});

leftside.addEventListener("click", () => {
  console.log("Left side works");

  scrollContainers.style.scrollBrhavior = "smooth";
  scrollContainers.scrollLeft -= 900;
});
rightside.addEventListener("click", () => {
  console.log("Right side works");

  scrollContainers.style.scrollBrhavior = "smooth";
  scrollContainers.scrollLeft += 800;
});
