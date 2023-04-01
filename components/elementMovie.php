<?php
echo "<div class='element-movie' onclick='movieDetail($item->id, $detailId, $type)'>
    <a href='#movieDetail$detailId'>
      <img class='filme' id='$item->id' src='https://image.tmdb.org/t/p/w220_and_h330_face/$item->poster_path' alt='' />
    </a>
  </div>
  ";
?>