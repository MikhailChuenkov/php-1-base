<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/style.css">
  <title>7-Homework</title>
</head>
<body>
<p>Напишите отзыв</p>
<form action="" method="post">
  <textarea name="comment" cols="40" rows="3" placeholder="Напишите что-нибудь"></textarea>
  <button type="submit" name="commentbtn" value="1">Разместить отзыв</button>
  <p>Ваши отзывы:</p>
  <ul>
      <?php foreach ($getComments as $val) { ?>
        <li><?= $val['comment'] ?></li>
      <? } ?>
  </ul>
</form>
<div id="products">
    <?php foreach ($getGoods as $product): ?>
      <div class="card-product-box">
        <a href="/product.php?id=<?= $product['id'] ?>">
          <img class="card-product-img" src="img/<?= $product['photo'] ?>" alt="product">
          <h2><?= $product['title'] ?></h2>
          <h4>$<?= $product['price'] ?></h4>
        </a>
        <form action="" method="post">
          <div class="add-flex">
            <a href="#add" class="add-to-cart">
              <button class="add-to-cart-cont" name="buybtn" value="<?=$product['id']?>">
                <img src="img/Forma 1 copy1.png" alt="cart">
                Add to Cart
              </button>
            </a>
          </div>
        </form>
      </div>
    <? endforeach; ?>
</div>
<form action="" method="post">
  <p>Войти в личный кабинет</p>
  <input type="login" name="login" placeholder="Логин">
  <input type="password" name="password" placeholder="Пароль">
  <button type="submit" name="userbtn" value="1">Войти</button>
</form>
<br>
<form action="" method="post">
  <p>Зарегистрироваться</p>
  <input type="login" name="loginReg" placeholder="Логин">
  <input type="password" name="passwordReg" placeholder="Пароль">
  <button type="submit" name="userbtnReg" value="1">Регистрация</button>
</form>
<br>
<form action="" method="post">
  <p>Это корзина</p>
    <?php foreach ($getProductsFromBasket as $ProductsFromBasket): ?>
  <h3><?=$ProductsFromBasket['productName']?></h3>
  <h3>Количество: <?=$ProductsFromBasket['productCount']?></h3>
  <h3>Цена: $<?=$ProductsFromBasket['productSumm']?></h3>
    <button type="submit" name="delProduct" value="<?=$ProductsFromBasket['productId']?>">
      Удалить товар
    </button>
    <? endforeach; ?>
  <h2>Сумма: <?=$getSummBasket?></h2>
</form>
</body>
</html>