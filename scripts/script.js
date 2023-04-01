function cartUpdate() {
  const moviesOnCart = Object.entries(localStorage);
  let i = 0;
  // Itera sobre cada item utilizando forEach
  moviesOnCart.forEach(([key, value]) => {
    if (value == "onCart") {
      i++;
    }
  });
  if (i <= 9) {
    document.querySelector('#cart').dataset.count = i;
  } else {

    document.querySelector('#cart').dataset.count = "9+";
  }
}
window.addEventListener('load', coockies())
function coockies() {
  for (let key in localStorage) {
    if (localStorage.hasOwnProperty(key)) {
      let xhr = new XMLHttpRequest();
      xhr.open('POST', '../pages/rented.php?key=' + key + '&value=' + localStorage.getItem(key));
      xhr.send();
    }
  }
}