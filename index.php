<?php
include(__DIR__ . '\oauth.php');
include(__DIR__ . '\functions\avatar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/button.css">
  <script src="functions/login.js"></script>
  <title>Document</title>
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
  <section class="container">
    <article>
      <p class="text-box text-main">
        Лаконио - это военно-политический Майнкрафт-Сервер, где вы можете стать лидером государства, воином, строителем, торговцем или другим деятелем на просторах карты
      </p>

      <img class="main_img" src="images/Rectangle2.png">

    </article>
    <article>
      <p class="text-box text-main">На сервере есть собственная система уровней, механика колоний транспорт, огнестрельное оружие, а также кастомные напитки и картины
      </p>

      <img class="main_img" src="images/ship.jpg">
    </article>

    <article>
      <p class="text-box text-main">
        &#619; Лакоины - валюта для покупки товаров и привилегий на
        нашем сервере. Лакоины приобретаются в магазине. При помощи команды /donate можно приобрести наборы, подписки
        или предметы за лакоины
      </p>

      <img class="main_img" src="images/gold.jpg">
    </article>

    <article>
      <p class="text-box text-main">
        Дискорд — основная платформа для общения на нашем сервере. Здесь проходят регистрация городов и наций, а также
        переговоры и конференции. Дискорд-сервер используется как площадка для увлекательных и веселых ивентов с
        отличными призами.
      </p>
      <img class="main_img" src="images/sign.jpg">
    </article>

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
<?php
/*$ftp_server = "93.125.42.181"; // Replace with your FTP server address
$ftp_port = 6061; // Default FTP port, can be omitted or set to 0 for default
$ftp_timeout = 30; // Timeout in seconds, can be omitted for default
$ftp_user_name = "farf";
$ftp_user_pass = "";

// Establish a connection
$conn_id = ftp_connect($ftp_server, $ftp_port, $ftp_timeout);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if ($conn_id) {
    echo "Successfully connected to $ftp_server\n";
    // You can now proceed with other FTP operations like login, upload, download, etc.
} else {
    echo "Could not connect to $ftp_server\n";
}*/
?>