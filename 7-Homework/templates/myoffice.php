<?//var_dump($getUserById);?>
<p>My office</p>
<h1>Hello!</h1>
<h2>You login: <?=$getUserById['login']?></h2>
<h2>You password: <?=$getUserById['password']?></h2>
<h3>История моих заказов</h3>

<? foreach ($getProductByOrderId as $item):?>
  <hr>
  <p>Ваш заказ №<?=$item[0]['orderId']?></p>
<div id="order_<?=$item[0]['orderId']?>">
    <?php
    foreach ($item as $ProductsFromOrderProduct): ?>
      <h3><?=$ProductsFromOrderProduct['productName']?></h3>
      <h3>Количество: <?=$ProductsFromOrderProduct['countProduct']?></h3>
      <h3>Цена: $<?=$ProductsFromOrderProduct['productSumm']?></h3>
    <?endforeach; ?>
  <br>
  <h2>Сумма: $<?=$item[0]['orderSumm']?></h2>
  <button class="clear_order" data-id="<?=$item[0]['orderId']?>">
    Удалить заказ
  </button>
  <br>
  <br>
</div>
<? endforeach;?>
<br>
<br>
<a href="/">Вернуться на главную</a>
<script>
  $(function () {
    $(".clear_order").on('click', function () {
      var id = $(this).data('id');
      $.ajax({
        url : "clear.php",
        type: "POST",
        data: {
          id: id
        },
        success : function (response) {
          response = JSON.parse(response);
          if (response.success == 'ok') {
            let orderId = 'order_' + id;
            let order = document.getElementById(orderId);
            order.textContent = 'Отменен';
            alert(response.message);
          }
        }
      })
    })
  })
</script>