<?php
include(__DIR__ . '\oauth.php');
include(__DIR__ . '\functions\avatar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>

  </title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/button.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
  <?php  include(__DIR__ . '\components\header.php'); ?> 

  <section class="container-dashboard">
  <?php  if (session('access_token')) {
   if (roles() == 'Теневое правительство') {?>
    <form action="" method="post" class="signin">
        <label>Заголовок</label>
        <input type="text" name="title" id="title" maxlength=20 placeholder="">
        <label>Краткое описание</label>
        <textarea name="exerpt" maxlength=50 id="exerpt" placeholder=""></textarea>
        <label>Картинка для статьи</label>
        <input type="file" name="file" id="file" placeholder="Выбрать файл">
        <label>Текст статьи</label>
        <textarea name="title" id="desc" placeholder=""></textarea>
    </form>
    <?php }
    else { ?>
    <p>Недостаточно прав для просмотра</p>
  <?php  }}?>
  </section>
  <?php  include(__DIR__ . '\components\footer.php'); ?> 

</body>

</html>