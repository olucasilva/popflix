<?php
echo "<div class='element-movie' onclick='movieDetail($movie->id, $detailId)'>
    <a href='#movieDetail$detailId'>
      <img class='filme' id='$movie->id' src='https://image.tmdb.org/t/p/w220_and_h330_face/$movie->poster_path' alt='' />
    </a>
  </div>
  
  ";
?>