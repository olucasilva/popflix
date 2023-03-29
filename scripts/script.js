function movieDetail(id, detailId) {
  localStorage.setItem("detailed", id);
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
function addToChart() {
  const id = localStorage.getItem('detailed');
  localStorage.setItem(id, "");
  alert(`Filme ${id} adicionado ao carrinho.`);
}
function removeFromChart() {
  const id = localStorage.getItem('detailed');
  localStorage.removeItem(id, "");
  alert(`Filme ${id} removido do carrinho.`);
} 