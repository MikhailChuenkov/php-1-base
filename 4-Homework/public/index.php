<?php
header("Content-type: text/html; charset=utf-8");

include  __DIR__ . '/../config/main.php';
include ENGINE_DIR . "render.php";

function filesServer(){
    $files = scandir(UPLOADS_DIR);
    $files = excess($files);
    for ($i =0; $i < count($files); $i++) {
        $pic = "/uploads/".$files[$i];
        echo "<a href='#'><img src='$pic' alt='$files[$i]'/></a>";
    }
}

filesServer();

function excess($files) {
    $result = [];
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != "." && $files[$i] != "..") {
            $result[] = $files[$i];
        }
    }
    return $result;
}



?>

<form action="<?ENGINE_DIR . "render.php"?>" enctype="multipart/form-data" method="post">
    <input type="file" name = 'file'>
    <input type="submit">
</form>