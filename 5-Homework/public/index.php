<?php
header("Content-type: text/html; charset=utf-8");
include  __DIR__ . '/../config/main.php';
//include  TEMPLATES_DIR . 'gallery.php';
/*
$conn = mysqli_connect("localhost", "root", "", "litle_shop");

$sql = "SELECT name FROM litle_shop.products";
if (!$res = mysqli_query($conn, $sql)) {
  var_dump(mysqli_error($conn));
}

//var_dump($res);

if($id = $_GET['id']){
    $id = (int) mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM litle_shop.products WHERE id = {$id}";

     if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    var_dump($data);
}


while($row = mysqli_fetch_assoc($res)){
    var_dump($row);
}
mysqli_close($conn);
*/

?>
<form action="">
    <input type="text" name="id"/>
    <input type="submit"/>
</form>
