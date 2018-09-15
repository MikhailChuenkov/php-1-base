<?php
header("Content-type: text/html; charset=utf-8");
/**
 * ------ Задание 1
 */
echo "<p>------ Задание 1</p>";
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo "$i ";
    }
    $i++;
}

/**
 * ------ Задание 2
 */
echo "<p>------ Задание 2</p>";

$i = 0;
do {
    if ($i == 0) {
        echo "<p>$i - Это ноль</p>";
    } else if ($i % 2 != 0 && $i != 0) {
        echo "<p>$i - нечетное число</p>";
    } else {
        echo "<p>$i - четное число</p>";
    }
    $i++;
} while ($i <= 10);

/**
 * ------ Задание 3
 */
echo "<p>------ Задание 3</p>";

$arrCity = [
    "Ставропольский край" => [
        "Ставрополь",
        "Кисловодск",
        "Пятигорск",
        "Кочубеевское",
    ],
    "Московская область" => [
        "Москва",
        "Долгопрудный",
        "Красногорск",
    ],
    "Республика Марий Эл" => [
        "Йошкар-Ола",
        "Козьмодемьянск",
        "Волжск",
    ],
];

function getCity($city)
{
    foreach ($city as $key => $value) {
        echo "$key:<br>";
        if (is_array($value)) {
            $arrLengthValue = count($value);
            for ($i = 0; $i < $arrLengthValue; $i++) {
                if ($i == $arrLengthValue - 1) {
                    // если город последний, ставим перенос строки
                    echo "$value[$i] <br>";
                } else {
                    //если не последний, ставим запятую
                    echo "$value[$i], ";
                }
            }
        }
    }
}

getCity($arrCity);
/**
 * ------ Задание 4
 */
echo "<p>------ Задание 4</p>";

$arrTranslation = [
    "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "yo", "ж" => "zh", "з" => "z",
    "и" => "i", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s",
    "т" => "t", "у" => "u", "ф" => "f", "х" => "kh", "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "tch", "ъ" => "'",
    "ы" => "y", "ь" => "'", "э" => "eh", "ю" => "yu", "я" => "ya", " " => " ", "," => ",",
];

function getTranslation($text, $arrTranslation)
{
    $arrText = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
    foreach ($arrText as $value) {
        foreach ($arrTranslation as $key => $valueTranslation)
            if ($key == $value) {
                $translationText .= $valueTranslation;
            }
    }
    return $translationText;
}

$rezult = getTranslation("привет, как дела", $arrTranslation);
echo $rezult;
/**
 * ------ Задание 5
 */
echo "<p>------ Задание 5</p>";

echo str_replace(" ", "_", "<p>$rezult</p>");

/**
 * ------ Задание 6
 */
echo "<p>------ Задание 6</p>";
echo "<link rel='stylesheet' href='style.css'>";

$arrMenu = [
    "Летняя одежда" => [
        "Футболки",
        "Шорты",
        "Кросовки",
        "Кепки",
    ],
    "Зимняя одежда" => [
        "Пуховики",
        "Сапоги",
        "Ушанки",
    ],
    "Ролики" => [],
    "Велосипеды" => [
        "Городские",
        "Горные",
        "Шоссейные",
    ],
    "Самокаты" => [],
];

function getMenu($menu)
{
    foreach ($menu as $key => $value) {
        echo "<ul>$key</ul>";
        if (is_array($value)) {
            $arrLengthValue = count($value);
            for ($i = 0; $i < $arrLengthValue; $i++) {
                echo "<li class='mList'>$value[$i] </li>";

            }
        }
    }
}

getMenu($arrMenu);

/**
 * ------ Задание 7
 */
echo "<p>------ Задание 7</p>";
for ($i = 0; $i < 10; var_dump($i++)) {}

/**
 * ------ Задание 8
 */
echo "<p>------ Задание 8</p>";

function getCityK($city)
{
    foreach ($city as $key => $value) {
        echo "$key:<br>";
        if (is_array($value)) {
            $arrLengthValue = count($value);
            $arrCityK = [];
            for ($i = 0; $i < $arrLengthValue; $i++) {
                $arrText = preg_split('//u', $value[$i], null, PREG_SPLIT_NO_EMPTY);
                if ($arrText[0] == "К") {
                    array_push($arrCityK, $value[$i]);
                }
            }
            $arrLengthValueK = count($arrCityK);
            for ($i = 0; $i < $arrLengthValueK; $i++) {
                if ($i == $arrLengthValueK - 1) {
                    // если город последний, ставим перенос строки
                    echo "$arrCityK[$i] <br>";
                } else {
                    //если не последний, ставим запятую
                    echo "$arrCityK[$i], ";
                }
            }
        }
    }
}

getCityK($arrCity);

/**
 * ------ Задание 9
 */
echo "<p>------ Задание 9</p>";

function getTranslationUrl($textBig, $arrTranslation)
{
    $text = mb_strtolower($textBig, 'UTF-8');
    $arrText = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
    foreach ($arrText as $value) {
        foreach ($arrTranslation as $key => $valueTranslation)
            if ($key == $value) {
                $translationText .= $valueTranslation;
            }
    }
    return str_replace(" ", "_", "<p>$translationText</p>");
}
echo getTranslationUrl("ПриИвет Как дЕла АКА", $arrTranslation);
