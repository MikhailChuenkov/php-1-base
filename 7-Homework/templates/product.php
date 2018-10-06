<div id="products">
      <div class="card-product-box">
        <a href="/product.php">
          <img class="card-product-img" src="img/<?= $getProduct['photo'] ?>" alt="product">
          <h2><?= $getProduct['title'] ?></h2>
          <h4>$<?= $getProduct['price'] ?></h4>
        </a>
        <form action="" method="post">
          <div class="add-flex">
            <a href="#add" class="add-to-cart">
              <button class="add-to-cart-cont" name="buybtn" value="<?=$getProduct['id']?>">
                <img src="img/Forma 1 copy1.png" alt="cart">
                Add to Cart
              </button>
            </a>
          </div>
        </form>
      </div>
      <div>Тут описание товара c id = <?= $getProduct['id'] ?></div>
</div>
<a href="/">Вернуться на главную</a>
