<?php
echo "<div class='element-movie' id='$movie->id' onclick='movieDetail($movie->id, $detailId)'>
    <a href='#movieDetail$detailId'>
      <img class='filme' src='https://image.tmdb.org/t/p/w220_and_h330_face/$movie->poster_path' alt='' />
    </a>
  </div>
  ";
?>