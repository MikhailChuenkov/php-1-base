<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php for ($i = 0; $i < count($sortGalleryForScorer);) {
    foreach ($gallery as $photo_small) {
      if ($photo_small['scorer'] == $sortGalleryForScorer[$i]){
        ?>
      <a target="_blank " href="photo.php?id=<?= $photo_small['id'] ?>">
        <img src="<?= $photo_small['src_small'] . $photo_small['name_small'] ?>">
      </a>
      <p><?= "Scorer: " . $photo_small['scorer'] ?></p>
    <?php $i++;}}}?>


<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name = 'image'>
    <input type="submit">
</form>
</body>
</html>
