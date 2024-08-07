let Mainimg = document.getElementById("Mainimg");
let smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = () => {
  Mainimg.src = smallimg[0].src;
};
smallimg[1].onclick = () => {
  Mainimg.src = smallimg[1].src;
};
smallimg[2].onclick = () => {
  Mainimg.src = smallimg[2].src;
};
smallimg[3].onclick = () => {
  Mainimg.src = smallimg[3].src;
};
