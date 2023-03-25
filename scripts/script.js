function movieDetail($id) {
  if ($id < 5) {
    document.querySelector('#movieDetail5').classList.add('show');
    document.querySelector('#movieDetail10').classList.remove('show');
  } else {
    document.querySelector('#movieDetail10').classList.add('show');
    document.querySelector('#movieDetail5').classList.remove('show');
  }
}
function closeMovieDetail() {
  const elements = document.querySelectorAll('.movie-details');

  elements.forEach((element) => {
    element.classList.remove('show');
  });
}