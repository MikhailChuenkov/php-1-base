<?php
/**
 * Created by PhpStorm.
 * User: Питекантроп
 * Date: 08.09.2018
 * Time: 21:11
 */

$name = "Михаил";
$age = 32;
$oneYear = 1;
$agePlus1 = $age + 1;
$agePlus2 = $age + 2;
$day = date(d);
$month = date(F);
$year = date(Y);
$hoer = date(G);
$minute = date(i);
$time = "$day-$month-$year $hoer:$minute";
$data = "Меня зовут $name. Мне $age года. Через год мне будет {$agePlus1}. А еще через год - {$agePlus2} На моих 
часах $time";

echo "<p>$data</p>";
echo str_replace(" ", "_", $data);
echo "<br><br>";
echo stristr($data, "На");

