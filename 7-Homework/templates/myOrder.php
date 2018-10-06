<h1>Оформление заказа</h1>
<h2>You login: <?=$getUserById['login']?></h2>
<h2>You password: <?=$getUserById['password']?></h2>
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
    <button type="submit" name="checkout" value="<?=$userId?>">
        Оформить заказ
    </button>
</form>

<a href="/">Вернуться на главную</a>