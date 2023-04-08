<div class='cart-item'>
    <div class='item-img'>
        <img class='item-cover' src='https://image.tmdb.org/t/p/w220_and_h330_face/<?php echo $poster_path ?>'>
    </div>
    <div class='title'>
        <?php echo $title ?>
    </div>
    <div class='price'>
        <?php echo $price ?>
    </div>
    <!-- Adicionar Funçao de remover do carrinho -->
    <div id='remove' onclick="removeFromCart(null, <?php echo $id ?>)">
        X
    </div>
</div>