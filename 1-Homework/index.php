<?php
/**
 * Created by PhpStorm.
 * User: Питекантроп
 * Date: 08.09.2018
 * Time: 20:16
 */
/**
 * Объяснить, как работает данный код:
 */
$a = 5;
$b = '05';
var_dump($a == $b);                    // Почему true? Потому, что php строку стримится преобразовать к числу,
// если идет операция (например сравнение) с числом 5=05 - это правда. Сравнение нестрогое
var_dump((int)'012345');                        // Почему 12345? Потому, что 0 не несет никакой нагрузки в
// вещественном числе
var_dump((float)123.0 == (int)123.0); // Почему false? Потому, что идет сравнение строгое. У первого значения тип
// данных float, а у вротого int, если сделать нестрогое (==), то будет true
var_dump((int)0 === (int)'hello, world'); // Почему true? Здесь php преобразует строку 'hello, world' в тип int, а
// так как цифр в этой строке не будет, то будет значение 0
echo (int)'hello, world';

/**
 * Задание 1
 */
$lesson = "Lesson 1";
$hello = "Hello, world!";
$year = date(Y);

echo "<h1>$lesson</h1>";
echo "<p>$hello</p>";
echo "Текущий год: $year";

/**
 * Задание 2
 */
$a = 1;
$b = 2;

$a = $a + $b; // a = 3, b = 2
$b = $a - $b; // a = 3, b = 1
$a = $a - $b;

echo "<p> a = $a, b = $b </p>";
