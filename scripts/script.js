const thumb = document.querySelector(".thumb");
const movieList = document.querySelector(".movie-list");
const prevLink = document.querySelector(".prev-link");
const nextLink = document.querySelector(".next-link");
const movieItems = document.querySelectorAll(".element-movie");

let scrollPos = 0;

prevLink.addEventListener("click", function (e) {
  e.preventDefault();
  scrollPos -= 110;
  if (scrollPos < 0) {
    scrollPos = 0;
  }
  movieList.scrollTo(scrollPos, 0);
});

nextLink.addEventListener("click", function (e) {
  e.preventDefault();
  scrollPos += 110;
  if (scrollPos > movieList.scrollWidth - movieList.clientWidth) {
    scrollPos = movieList.scrollWidth - movieList.clientWidth;
  }
  movieList.scrollTo(scrollPos, 0);
});

thumb.addEventListener("dragstart", function (e) {
  this.startY = e.clientY - this.offsetTop;
});

thumb.addEventListener("drag", function (e) {
  e.preventDefault();
  const posY = e.clientY - this.startY;
  const maxScroll = movieList.scrollHeight - movieList.clientHeight;
  const scrollY = (posY / document.querySelector(".scrollbar").offsetHeight) * maxScroll;
  movieList.scrollTop = scrollY;
});

// Troca os filmes por novos
function replaceMovies() {
  const newMovies = ["Movie 11", "Movie 12", "Movie 13", "Movie 14", "Movie 15", "Movie 16", "Movie 17", "Movie 18", "Movie 19", "Movie 20"];
  movieItems.forEach((item, index) => {
    item.innerHTML = newMovies[index];
    item.classList.remove(`movie-${index + 1}`); // Remove a classe com o identificador antigo
    item.classList.add(`movie-${index + 11}`); // Adiciona a classe com o identificador novo
  });
  scrollPos = 0;
  movieList.scrollTo(scrollPos, 0);
}

replaceMovies();

// Verifica se os identificadores dos elementos foram atualizados corretamente
const updatedMovieItems = document.querySelectorAll('.movie-item');
updatedMovieItems.forEach((item, index) => {
  console.log(item.classList.contains(`movie-${index + 11}`)); // Deve imprimir "true" para todos os elementos
});





