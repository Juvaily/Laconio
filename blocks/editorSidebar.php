<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <title>Document</title>
</head>
<?php
      define('__ROOT__', dirname(dirname(__FILE__))); 
      require_once(__ROOT__.'\laconio.local\auth.php');

?>
<body>
  <header>
    <nav>
      <span class="brand">
        <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
      </span>
      <ul class="menu">
        <li><a href="https://laconio.tebex.io/">Магазин</a></li>
        <li><a href="https://laconio.me/rules">Правила</a></li>
        <li><a href="https://laconio.me/rules">Wiki</a></li>
        <li><a href="https://map.laconio.me" target="_blank">Карта</a></li>
        <?php
          if (session('access_token')) {
            $user = apiRequest($apiURLBase);
            echo '<h3>Logged In</h3>';
            echo '<h4>' . $user->username . '</h4>';
            echo '<pre>';
            echo '<li><a href="?action=logout">Log Out</a></li>';
            echo '</pre>';
          }
        ?>
      </ul>
      <?php
      if (session('access_token')) {


      } else {
        echo '<h3>Not logged in</h3>';
        echo '<p><a href="?action=login">Log In</a></p>';
      }
      ?>
    </nav>

    <div class="shadow">
    </div>
  </header>
  <section>
    <div class="text-box">
      <p>
        Ł Лакоины - валюта для покупки товаров и привилегий на
        нашем сервере. Лакоины приобретаются в магазине. При помощи команды /donate можно приобрести наборы, подписки
        или предметы за лакоины
      </p>
      <hr>
      <button></button>
      <button></button>
    </div>
    <img src="images/gold.jpg">
  </section>

  <section>
    <img src="images/sign.jpg">
    <div class="text-box">
      <p>
        Дискорд — основная платформа для общения на нашем сервере. Здесь проходят регистрация городов и наций, а также
        переговоры и конференции. Дискорд-сервер используется как площадка для увлекательных и веселых ивентов с
        отличными призами.
      </p>
      <hr>
      <button></button>
    </div>
  </section>
  <footer>
    <div>
      <p>IP: <span style="color: #FF9900;">play.laconio.me</span></p>
      <p>Версия 1.19.4</p>
    </div>
    <div>
      <img src="images/Фиуме.svg">
    </div>
    <p> <?php echo "Laconio &copy; 2021-" . date("Y"); ?></p>
  </footer>
</body>

</html>