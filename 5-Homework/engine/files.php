<?php
function uploadFile($destination, $attributeName = 'file'){
    if(isset($_FILES[$attributeName])){
        move_uploaded_file($_FILES[$attributeName]['tmp_name'], $destination );
    }
}