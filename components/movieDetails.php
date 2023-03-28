<div class='movie-details' id='movieDetail<?php echo $id ?>'>
  <div class="arrow-box">
    <label for="left-arrow" class="left-arrow" onclick="closeMovieDetail()">&#8617;</label>
  </div>
  <img class="detail-cover" src="img/9PFonBhy4cQy7Jz20NpMygczOkv.jpg" alt="" />
  <div class="info">
    <div class="movie-price">
      <label for="price">R$99,99</label>
    </div>
    <div class="movie-description">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam blanditiis nisi autem vero nobis perspiciatis
        totam assumenda dolor. Mollitia officia pariatur recusandae, minima perferendis autem. Ut perspiciatis autem
        reiciendis temporibus.</p>
    </div>
    <div id="button">
      <button class="addRemove" onclick="addToChart()">Adicionar ao Carrinho</button>
      <button class="addRemove" onclick="removeFromChart()">Remover do Carrinho</button>
    </div>
    <div id="isRented"></div>
  </div>
</div>