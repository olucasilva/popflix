function cartUpdate() {
  const moviesOnCart = Object.entries(localStorage);
  let i = 0;
  // Itera sobre cada item utilizando forEach
  moviesOnCart.forEach(([key, value]) => {
    if(value == "onCart"){
      i++;
    }
  });
  if(i<=9){
  document.querySelector('#cart').dataset.count = i;
  }else{

  document.querySelector('#cart').dataset.count = "9+";
  }
}

function movieDetail(id, detailId) {
  const btnAdd = document.querySelector(`#add${detailId}`);
  const btnRemove = document.querySelector(`#remove${detailId}`);

  localStorage.setItem("detailed", id);

  for (let i = 0; i < localStorage.length; i++) {
    if (localStorage.key(i) == id) {
      btnAdd.classList.add('hide');
      btnRemove.classList.remove('hide');
      break;
    } else {
      btnAdd.classList.remove('hide');
      btnRemove.classList.add('hide');
    }
  }

  const details = document.querySelector(`#movieDetail${detailId}`);
  const closeDetails = document.querySelectorAll('.movie-details');
  const moviePoster = document.querySelector(`#moviePoster${detailId}`);
  const movieDescription = document.querySelector(`#movieDescription${detailId}`);
  const movieTitle = document.querySelector(`#movieTitle${detailId}`);
  const moviePrice = document.querySelector(`#moviePrice${detailId}`);

  fetch('data/movies.json')
    .then(response => response.json())
    .then(data => {
      const movie = data.find(objeto => objeto.id === id);

      if (movie) {
        moviePoster.src = `https://image.tmdb.org/t/p/w220_and_h330_face${movie.poster_path}`;
        movieDescription.innerHTML = movie.overview;
        movieTitle.innerHTML = movie.title;
        moviePrice.innerHTML = `R$${movie.price}`;
      } else {
        console.log(`Objeto com ID ${id} não encontrado`);
      }
    })
    .catch(error => console.error(error));

  closeDetails.forEach((closeDetails) => {
    closeDetails.classList.remove('show');
  });
  details.classList.add('show');
}
function closeMovieDetail(detailId) {
  const elements = document.querySelectorAll('.movie-details');

  const moviePoster = document.querySelector(`#moviePoster${detailId}`);
  moviePoster.src = '';

  localStorage.removeItem("detailed");

  elements.forEach((element) => {
    element.classList.remove('show');
  });
}
function addToCart(detailId) {
  const id = localStorage.getItem('detailed');
  localStorage.setItem(id, "onCart");
  alert(`Filme ${id} adicionado ao carrinho.`);
  const btnAdd = document.querySelector(`#add${detailId}`);
  const btnRemove = document.querySelector(`#remove${detailId}`);
  const movie = document.getElementById(id);

  movie.classList.add('oncart');
  btnAdd.classList.add('hide');
  btnRemove.classList.remove('hide');

  cartUpdate();
}
function removeFromCart(detailId) {
  const id = localStorage.getItem('detailed');
  localStorage.removeItem(id, "");
  alert(`Filme ${id} removido do carrinho.`);
  const btnAdd = document.querySelector(`#add${detailId}`);
  const btnRemove = document.querySelector(`#remove${detailId}`);
  const movie = document.getElementById(id);

  movie.classList.remove('oncart');

  btnAdd.classList.remove('hide');
  btnRemove.classList.add('hide');
  
  cartUpdate();
} 