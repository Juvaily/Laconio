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
  <header>
    <nav>
      <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
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

          echo '<p class ="button" id="avatar"><a>' . $user->username . '</a>';
          avatar($user->username, $user->avatar, $user->id);
          echo '</p>';
          echo '<p><a href="?action=logout">Выйти админу</a></p>';
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
  <section class="container-dashboard">
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
  </section>
  <footer>
    <div>
      <p>IP: <span style="color: #FF9900;">play.laconio.me</span></p>
      <p>Версия 1.19.4</p>
    </div>
    <div>
      <img class="logo" src="images/Слой_1.svg">
      <img class="logo" src="images/впи.jpg">
      <img class="logo" src="images/tyan.jpg">
    </div>
    <p> <?php echo "Laconio &copy; 2021-" . date("Y"); ?></p>
  </footer>

</body>

</html>