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
function clearCart(){
  const cart = Object.entries(localStorage);
  let i = 0;
  // Itera sobre cada item utilizando forEach
  cart.forEach(([key, value]) => {
    localStorage.removeItem(key, value);
  });
}