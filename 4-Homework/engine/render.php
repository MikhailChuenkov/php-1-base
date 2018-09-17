<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"])) {
        if (!file_exists(UPLOADS_DIR)) {
            mkdir(UPLOADS_DIR);
        }
        if ($_FILES["file"]["size"] <= 500000 &&
            $_FILES["file"]["type"] == "image/jpeg") {
            $files = scandir(UPLOADS_DIR);
            $files = excess($files);
            if (count($files) != 0) {
                for ($i = 0; $i < count($files); $i++) {
                    $filenameServer = stristr($files[$i], ".", true);
                    $filenameLoad = stristr($_FILES["file"]["name"], ".", true);
                    if ($filenameLoad == $filenameServer) {
                        $filenameLoad .= substr(uniqid('', true), -3);
                        echo "Совпали имена";
                        var_dump($filenameLoad . stristr($_FILES["file"]["name"], "."));
                        $filename = UPLOADS_DIR . $filenameLoad . stristr($_FILES["file"]["name"], ".");
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
                    } else {
                        $filename = UPLOADS_DIR . $_FILES["file"]["name"];
                        //var_dump($filename);
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
                    }
                }
            } else {
                $filename = UPLOADS_DIR . $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
            }
        } else {
            echo "<p>Загрузите файл в формате jpeg с размером до 0.5Мб</p>";
        }
        /*
        $filename = UPLOADS_DIR . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
        */
    }
}




