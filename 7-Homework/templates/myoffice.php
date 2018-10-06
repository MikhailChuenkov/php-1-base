<?//var_dump($getUserById);?>
<p>My office</p>
<h1>Hello!</h1>
<h2>You login: <?=$getUserById['login']?></h2>
<h2>You password: <?=$getUserById['password']?></h2>
<h3>История моих заказов</h3>

<? foreach ($getProductByOrderId as $item):?>
  <p>Это старый заказ</p>
    <?php
    $SummOrder = 0;
    foreach ($item as $ProductsFromOrderProduct): ?>
    <h3><?=$ProductsFromOrderProduct['productName']?></h3>
    <h3>Количество: <?=$ProductsFromOrderProduct['countProduct']?></h3>
    <h3>Цена: $<?=$ProductsFromOrderProduct['productSumm']?></h3>
    <?
    $SummOrder += $ProductsFromOrderProduct['productSumm'];
    $orderId = $ProductsFromOrderProduct['orderId'];
    endforeach; ?>
  <h2>Сумма: <?=$SummOrder?></h2>
  <button id="clear_order" data-id="<?=$orderId?>">
    Удалить заказ
  </button>
<? endforeach;?>

<a href="/">Вернуться на главную</a>

<script>
  $(function () {
    $("#clear_order").on('click', function () {
      var id = $(this).data('id');
      $.ajax({
        url : "myoffice.php",
        type: "POST",
        data: {
          id: id
        },
        success : function (response) {
          response = JSON.parse(response);
          if(response.success == 'ok'){
            alert(response.message)
          }
        }
      })
    })
  })
</script>