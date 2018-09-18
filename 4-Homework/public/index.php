<?php
header("Content-type: text/html; charset=utf-8");

include __DIR__ . '/../config/main.php';
include ENGINE_DIR . "render.php";

function filesServer()
{
    if (file_exists(UPLOADS_DIR)){
    $files = scandir(UPLOADS_DIR);
    $files = excess($files);
    if (!file_exists(UPLOADSSMALL_DIR)) {
        mkdir(UPLOADSSMALL_DIR);
    }
    for ($i = 0; $i < count($files); $i++) {
        $pic = UPLOADS_DIR . $files[$i];
        $fileSmall = stristr($files[$i], ".", true) . "_small" . stristr($files[$i], ".");
        $picSmall = UPLOADSSMALL_DIR . $fileSmall;
        img_resize($pic, $picSmall, 100, 75);
        $srcPic = "/uploads/" . $files[$i];
        $srcPicSmall = "/uploadssmall/" . $fileSmall;
        echo "<a href='$srcPic' target='_blank'><img src='$srcPicSmall' style='margin: 20px' alt='$fileSmall'/></a>";
    }
    }
}

filesServer();

function excess($files)
{
    $result = [];
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != "." && $files[$i] != "..") {
            $result[] = $files[$i];
        }
    }
    return $result;
}


/***********************************************************************************
 * Функция img_resize(): генерация thumbnails
 * Параметры:
 * $src             - имя исходного файла
 * $dest            - имя генерируемого файла
 * $width, $height  - ширина и высота генерируемого изображения, в пикселях
 * Необязательные параметры:
 * $rgb             - цвет фона, по умолчанию - белый
 * $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
 ***********************************************************************************/

function img_resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100)
{
    if (!file_exists($src)) return false;

    $size = getimagesize($src);

    if ($size === false) return false;

    // Определяем исходный формат по MIME-информации, предоставленной
    // функцией getimagesize, и выбираем соответствующую формату
    // imagecreatefrom-функцию.
    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
    $icfunc = "imagecreatefrom" . $format;
    if (!function_exists($icfunc)) return false;

    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];

    $ratio = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);

    $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
    $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
    $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

    $isrc = $icfunc($src);
    $idest = imagecreatetruecolor($width, $height);

    imagefill($idest, 0, 0, $rgb);
    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);

    imagejpeg($idest, $dest, $quality);

    imagedestroy($isrc);
    imagedestroy($idest);

    return true;
}

function tree(){
    if ($dir = opendir(".")) {
        while ($file = readdir()) {
            if ($file != "." && $file != ".."){
                if (is_dir($file)) {
                    echo "<b>{$file}</b><br>";
                } else {
                    echo "{$file}<br>";
                }
            }
        }
        closedir($dir);
    }
}
function showTree($folder, $space) {
    /* Получаем полный список файлов и каталогов внутри $folder */
    $files = scandir($folder);
    foreach($files as $file) {
        /* Отбрасываем текущий и родительский каталог */
        if (($file == '.') || ($file == '..')) continue;
        $f0 = $folder.'/'.$file; //Получаем полный путь к файлу
        /* Если это директория */
        if (is_dir($f0)) {
            /* Выводим, делая заданный отступ, название директории */
            echo "<b>$space.$file</b><br />";
            /* С помощью рекурсии выводим содержимое полученной директории */
            showTree($f0, $space.'&nbsp;&nbsp;');
        }
        /* Если это файл, то просто выводим название файла */
        else echo $space.$file."<br />";
    }
}

?>

<form action="<?ENGINE_DIR . "render.php" ?>" enctype="multipart/form-data" method="post">
    <input type="file" name='file'>
    <input type="submit">
</form>
<?
//tree();
function removeDirectory($dir) {
    if ($objs = glob($dir."/*")) {
        foreach($objs as $obj) {
            is_dir($obj) ? removeDirectory($obj) : unlink($obj);
        }
    }
    rmdir($dir);
}

//removeDirectory(UPLOADSSMALL_DIR);

/* Запускаем функцию для текущего каталога */
showTree("../", " ");
?>