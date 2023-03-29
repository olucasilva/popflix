<div class='movie-details' id='movieDetail<?php echo $detailId ?>'>
  <a href="#row<?php echo $detailId ?>" style="text-decoration: none"><div class="arrow-box">
    <label for="left-arrow" class="left-arrow" onclick="closeMovieDetail(<?php echo $detailId ?>)">&#8617;</label>
  </div></a>
  <img class="detail-cover" id="moviePoster<?php echo $detailId ?>" />
  <div class="info">
    <div class="movie-title">
      <label for="title" id="movieTitle<?php echo $detailId ?>"></label>
    </div>
    <div class="movie-price">
      <label for="price" id="moviePrice<?php echo $detailId ?>"></label>
    </div>
    <div class="movie-description">
      <p id="movieDescription<?php echo $detailId ?>"></p>
    </div>
    <div id="button">
      <button class="add" id="add<?php echo $detailId ?>" onclick="addToCart(<?php echo $detailId ?>)">Adicionar ao Carrinho</button>
      <button class="remove" id="remove<?php echo $detailId ?>"onclick="removeFromCart(<?php echo $detailId ?>)">Remover do Carrinho</button>
    </div>
    <div id="isRented"></div>
  </div>
</div>