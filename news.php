<?php
include(__DIR__ . '\oauth.php');
include(__DIR__ . '\functions\avatar.php');
include(__DIR__ . '\components\connect.php');
if (!is_null($conn)) {
  $statement = $conn->prepare("SELECT * FROM info_news.articles ORDER BY created_at DESC LIMIT 3");
  $statement->execute();
  $articles = $statement->fetchAll(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>

  </title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/news.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/button.css">

</head>

<body>
  <?php  include(__DIR__ . '\components\header.php'); 
    if (session('access_token')) {
         if (roles() == 'Теневое правительство') { ?>
  <section class="container-news">
    <?php
    foreach ($articles as $key => $article): ?>
      <div class="article-news">
        <h3><?= $article->title ?></h3>
        <span class="article-info">
          <p class="author"><img class="icon" src="../images/account.svg" alt=""><?= $article->author ?>
          <p>
          <p class="date"><img class="icon" src="../images/time.svg" alt=""><?= $article->published_on ?></p>
        </span>
        <span class="article-main">
          <span>
            <img class="news-img" src="../images/<?= $article->cover ?>" alt="...">
            <p class="text-news"><?= $article->exerpt ?></p>
        </span>
      </div>
    <?php endforeach; ?>
    <?php }}?>
  </section>
  <ul class="pages">
    <li><a href="">&laquo; Пред.</a></li>
    <li><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">След. &raquo;</a></li>
  </ul>
<?php  include(__DIR__ . '\components\footer.php'); ?> 
</body>