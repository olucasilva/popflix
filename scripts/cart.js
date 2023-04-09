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
  if (document.cookie.length==0 && moviesOnCart.length!=0) {
    clearCart();
  }
}
function clearCart() {
  const cart = Object.entries(localStorage);
  let i = 0;
  // Itera sobre cada item utilizando forEach
  cart.forEach(([key, value]) => {
    localStorage.removeItem(key, value);
  });
}
function addToCart(detailId) {
  const id = localStorage.getItem('detailed');

  localStorage.setItem(id, "onCart");
  document.cookie = id + "=onCart;path=/";

  const btnAdd = document.querySelector(`#add${detailId}`);
  const btnRemove = document.querySelector(`#remove${detailId}`);
  const movie = document.getElementById(id);

  movie.classList.add('oncart');
  btnAdd.classList.add('hide');
  btnRemove.classList.remove('hide');

  closeMovieDetail(detailId);
  cartUpdate();
}
function removeFromCart(detailId, itemId) {
  if (itemId == null && detailId != null) {
    const id = localStorage.getItem('detailed');

    localStorage.removeItem(id, "");
    document.cookie = id + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';

    const btnAdd = document.querySelector(`#add${detailId}`);
    const btnRemove = document.querySelector(`#remove${detailId}`);
    const movie = document.getElementById(id);

    movie.classList.remove('oncart');

    btnAdd.classList.remove('hide');
    btnRemove.classList.add('hide');

    closeMovieDetail(detailId);
    cartUpdate();
  } else if (itemId != null && detailId == null) {
    localStorage.removeItem(itemId, "");
    document.cookie = itemId + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
    location.reload();
  }
}