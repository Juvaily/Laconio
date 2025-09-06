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

  <link rel="stylesheet" href="../css/donate.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/button.css">
  <link rel="stylesheet" href="../css/accordion.css">

</head>

<body>
  <header>
    <nav>
      <span class="brand">
        <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
      </span>
      <ul class="menu">
        <li class="button">
          <h2><a href="https://laconio.tebex.io/">Магазин</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://laconio.me/rules">Правила</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://laconio.me/rules">Wiki</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://map.laconio.me" target="_blank">Карта</a></h2>
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


  <h3>Подписки</h3>
   <?php 
   include(__DIR__ . '\kits\lite.php');
   include(__DIR__ . '\kits\pro.php');
   include(__DIR__ . '\kits\full.php');
   ?>
  <h3>Обычные наборы</h3>
<?php
   include(__DIR__ . '\kits\blacksmith.php');
   include(__DIR__ . '\kits\miner.php');   
   include(__DIR__ . '\kits\hunter.php');  
   include(__DIR__ . '\kits\farmer.php'); 
   ?>
  <h3>Строительные Наборы</h3>
   <?php  
   include(__DIR__ . '\kits\wool.php');
   include(__DIR__ . '\kits\light.php');
   include(__DIR__ . '\kits\flowers.php');
   include(__DIR__ . '\kits\ground.php');
   include(__DIR__ . '\kits\sand.php');
   include(__DIR__ . '\kits\bricks.php');
   include(__DIR__ . '\kits\quartz.php');
   include(__DIR__ . '\kits\prismarine.php');
   include(__DIR__ . '\kits\wood.php');
   include(__DIR__ . '\kits\end.php');
   include(__DIR__ . '\kits\concrete.php');
   include(__DIR__ . '\kits\ice.php');
   include(__DIR__ . '\kits\nether1.php');
   include(__DIR__ . '\kits\nether2.php');
   include(__DIR__ . '\kits\warrior.php');
   ?>
  <footer>
    <div>
      <p>IP: <span style="color: #FF9900;">play.laconio.me</span></p>
      <p>Версия 1.19.4</p>
    </div>
    <div>
      <img class="logo" src="images/Слой_1.svg">
      <img class="logo" src="images/впи.jpg">
      <img class="logo" src="images/tyan.jpg">
      <img class="logo" src="images/PRFKS.png">
    </div>
    <p> <?php echo "Laconio &copy; 2021-" . date("Y"); ?></p>
  </footer>
</body>
<script src="../functions/script.js"></script>
