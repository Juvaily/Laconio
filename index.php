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
  <title>Document</title>
</head>

<body>
  <?php  include(__DIR__ . '\components\header.php'); ?> 
  <section class="container">
    <article>
      <p class="text-box text-main">
        Лаконио - это военно-политический Майнкрафт-Сервер, где вы можете стать лидером государства, воином, строителем, торговцем или другим деятелем на просторах карты
      </p>

      <img class="main_img" src="images/Rectangle2.png">

    </article>
    <article>
      <p class="text-box text-main">На сервере есть собственная система шахт и заводов, транспорт, огнестрельное оружие, а также кастомные напитки и картины
      </p>

      <img class="main_img" src="images/ship.jpg">
    </article>

    <article>
      <p class="text-box text-main">
        &#321; Лакоины - валюта для покупки товаров и привилегий на
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
<?php  include(__DIR__ . '\components\footer.php'); ?> 
</body>
<script src="../functions/script.js"></script>
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