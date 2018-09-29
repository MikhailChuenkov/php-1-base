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
<p>Калькулятор. 1 задание</p>
<form action="" method="get">
  <input type="text" name="num1" placeholder="Превое число">
  <select name="operation" id="1">
    <option value="sum">Сложить</option>
    <option value="subt">Вычесть</option>
    <option value="mult">Умножить</option>
    <option value="divis">Разделить</option>
  </select>
  <input type="text" name="num2" placeholder="Второе число">
  <input type="submit" value="Вычислить">
  <span>Результат: <?= $res1 ?></span>
</form>
<p>Калькулятор. 2 задание</p>
<form action="" method="post">
  <input type="text" name="num1" placeholder="Превое число">
  <input type="text" name="num2" placeholder="Второе число">
  <button type="submit" name="operation" value="sum">Сложить</button>
  <button type="submit" name="operation" value="subt">Вычесть</button>
  <button type="submit" name="operation" value="mult">Умножить</button>
  <button type="submit" name="operation" value="divis">Разделить</button>
  <span>Результат: <?= $res2 ?></span>
</form>
<p>Напишите отзыв</p>
<form action="" method="post">
  <textarea name="comment" cols="40" rows="3" placeholder="Напишите что-нибудь"></textarea>
  <button type="submit">Разместить отзыв</button>
  <p>Ваши отзывы:</p>
  <ul>
      <?php foreach ($getComments as $val) { ?>
        <li><?= $val['comment'] ?></li>
      <? } ?>
  </ul>
</form>
<div id="products">
  <?php foreach ($getGoods as $good){?>
  <div class="card-product-box">
    <a href="single%20page.html">
      <img class="card-product-img" src="img/<?=$good['photo']?>" alt="product">
      <h2><?=$good['title']?></h2>
      <h4>$<?=$good['price']?></h4>
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
  <?}?>
</div>
</body>
</html>