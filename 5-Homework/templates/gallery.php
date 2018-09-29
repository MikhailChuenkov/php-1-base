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
<?php foreach ($gallery as $photo_small) {
    ?>
  <a target="_blank " href="photo.php?id=<?= $photo_small['id'] ?>">
    <img src="img/small/<?= $photo_small['name'] ?>">
  </a>
  <p><?= "Scorer: " . $photo_small['scorer'] ?></p>
<?php } ?>

<form action="" enctype="multipart/form-data" method="post">
  <input type="file" name='image'>
  <input type="submit">
</form>
</body>
</html>
