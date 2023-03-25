
function movieDetail(id) {
  document.cookie = `detailed=${id}`;
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

  document.cookie="detailed = null;expires=Sun, 28 Nov 2018 13:15:00 UTC";

  elements.forEach((element) => {
    element.classList.remove('show');
  });
}
function addToChart(id){
  document.cookie = `${id}=1`;
}
function removeFromChart(id){
  cookie.remove(id);
}