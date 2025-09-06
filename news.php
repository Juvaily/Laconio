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
  <header>
    <nav>
      <span class="brand">
        <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
      </span>
      <ul class="menu">
        <li class="button">
          <a href="https://laconio.tebex.io/">Магазин</a>
        </li>
        <li class="button">
          <a href="https://laconio.me/rules">Правила</a>
        </li>
        <li class="button">
          <a href="https://laconio.me/rules">Wiki</a>
        </li>
        <li class="button">
          <a href="https://map.laconio.me" target="_blank">Карта</a>
        </li>
      </ul>
      <?php
      if (session('access_token')) {
        $user = apiRequest($apiURLBase);
        if (roles() == 'user') //теневое правительство
        {
          echo '<div class ="button" id="avatar"><a>' . $user->username . '</a>';
          avatar($user->username, $user->avatar, $user->id);
          echo '</div>';
          echo '<div if="login"><a href="?action=logout">Выйти</a>
        </div>';
        } else if (roles() == 'Теневое правительство') {

          echo '<div class ="button" id="avatar"><a>' . $user->username . '</a>';
          avatar($user->username, $user->avatar, $user->id);
          echo '</div>';
          echo '<div><a href="?action=logout">Выйти админу</a>
        </div>';
        }
      } else {
        echo '<button class="learn-more">
        <span class="circle" aria-hidden="true">
          <span class="icon arrow"></span>
        </span>
        <span class="button-text">
          <a href="?action=login">Войти</a>
        </span>
        </button>';
      }
      ?>
    </nav>
  </header>
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
    <?php endforeach ?>
  </section>
  <ul class="pages">
    <li><a href="">&laquo; Пред.</a></li>
    <li><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">След. &raquo;</a></li>
  </ul>
  <footer>
    <div>
      <p>IP: <span style="color: #FF9900;">play.laconio.me</span></p>
      <p>Версия 1.19.4</p>
    </div>
    <div>
      <img class="logo" src="images/Фиуме.jpg">
    </div>
    <p> <?php echo "Laconio &copy; 2021-" . date("Y"); ?></p>
  </footer>
</body>