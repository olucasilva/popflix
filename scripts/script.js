
function movieDetail(id) {
  localStorage.setItem("detailed", id);
  
  if (id < 5) {
    document.querySelector('#movieDetail5').classList.add('show');
    document.querySelector('#movieDetail10').classList.remove('show');
  } else {
    document.querySelector('#movieDetail10').classList.add('show');
    document.querySelector('#movieDetail5').classList.remove('show');
  }
}
function closeMovieDetail() {
  const elements = document.querySelectorAll('.movie-details');

  localStorage.removeItem("detailed");

  elements.forEach((element) => {
    element.classList.remove('show');
  });
}
function addToChart(){
  const id = localStorage.getItem('detailed');
  localStorage.setItem(id,"");
  alert(`Filme ${id} adicionado ao carrinho.`);
}
function removeFromChart(){
  const id = localStorage.getItem('detailed');
  localStorage.removeItem(id,"");
  alert(`Filme ${id} removido do carrinho.`);
} 