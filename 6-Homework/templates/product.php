<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/style.css">
  <title>6-Homework</title>
</head>
<body>
<div id="products">
      <div class="card-product-box">
        <a href="/product.php">
          <img class="card-product-img" src="img/<?= $getProduct['photo'] ?>" alt="product">
          <h2><?= $getProduct['title'] ?></h2>
          <h4>$<?= $getProduct['price'] ?></h4>
        </a>
        <div class="add-flex">
          <a href="#add" class="add-to-cart">
            <div class="add-to-cart-cont">
              <img src="img/Forma 1 copy1.png" alt="cart">
              Add to Cart
            </div>
          </a>
        </div>
      </div>
      <div>Тут описание товара c id = <?= $getProduct['id'] ?></div>
</div>

</body>
</html>
