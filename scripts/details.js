function movieDetail(idSerie, detailId, type) {
  const btnAdd = document.querySelector(`#add${detailId}`);
  const btnRemove = document.querySelector(`#remove${detailId}`);

  localStorage.setItem("detailed", idSerie);

  for (let i = 0; i < localStorage.length; i++) {
    if (localStorage.key(i) == idSerie) {
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
  const movieSize = document.querySelector(`#ts${detailId}`);
  
  if (type == 0) {
    fetch('../data/movies.json')
      .then(response => response.json())
      .then(data => {
        const movie = data.find(objeto => objeto.id === idSerie);

        if (movie) {
          moviePoster.src = `https://image.tmdb.org/t/p/w220_and_h330_face${movie.poster_path}`;
          movieDescription.innerHTML = movie.overview;
          movieTitle.innerHTML = movie.title;
          moviePrice.innerHTML = `R$${movie.price}`;
          let sizeText = 'minutos';
          movieSize.dataset.size = movie.size + " " + sizeText;
        } else {
          console.log(`Objeto com ID ${id} não encontrado`);
        }
      })
      .catch(error => console.error(error));
  } else {
    fetch('../data/series.xml')
      .then(response => response.text())
      .then(data => {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(data, 'application/xml');
        const seriesList = xmlDoc.getElementsByTagName('serie');

        let id = null; let name = null; let overview = null; let posterPath = null;
        let price = null; let size = null;

        for (const serie of seriesList) {
          const idItem = serie.querySelector('id').textContent;
          if (idItem == idSerie) {
            id = serie.querySelector('id').textContent;
            name = serie.querySelector('name').textContent;
            overview = serie.querySelector('overview').textContent;
            posterPath = serie.querySelector('poster_path').textContent;
            price = serie.querySelector('price').textContent;
            size = serie.querySelector('size').textContent;
          }
        }

        moviePoster.src = `https://image.tmdb.org/t/p/w220_and_h330_face${posterPath}`;
        movieDescription.innerHTML = overview;
        movieTitle.innerHTML = name;
        moviePrice.innerHTML = `R$${price}`;
        let sizeText = 'temporadas';
        movieSize.dataset.size = size + " " + sizeText;
      });
  }

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