<?php

function render($template, $params = [], $useLayout = true){
    $content = renderTemplate($template, $params);
    if($useLayout){
        $content = renderTemplate("layout/main", ['content' => $content]);
    }
    echo $content;
}

function renderTemplate($template, $params = []){
    extract($params);
    ob_start();
    include TEMPLATES_DIR . "{$template}.php";
    return ob_get_clean();
}