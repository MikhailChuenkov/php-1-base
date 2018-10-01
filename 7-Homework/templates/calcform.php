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


