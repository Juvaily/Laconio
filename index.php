<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <title>Document</title>
</head>

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
      </ul>
      <?php

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)
      
      error_reporting(E_ALL);

      define('OAUTH2_CLIENT_ID', '1337889537355153551');
      define('OAUTH2_CLIENT_SECRET', 'pEiUe93SpEZFJFvGUZAyv-txzeA9B-7V');

      $authorizeURL = 'https://discord.com/api/oauth2/authorize';
      $tokenURL = 'https://discord.com/api/oauth2/token';
      $apiURLBase = 'https://discord.com/api/users/@me';
      $revokeURL = 'https://discord.com/api/oauth2/token/revoke';

      session_start();

      // Start the login process by sending the user to Discord's authorization page
      if (get('action') == 'login') {

        $params = array(
          'client_id' => OAUTH2_CLIENT_ID,
          'redirect_uri' => 'https://laconio.local/',
          'response_type' => 'code',
          'scope' => 'identify guilds'
        );

        // Redirect the user to Discord's authorization page
        header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));
        die();
      }


      // When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
      if (get('code')) {

        // Exchange the auth code for a token
        $token = apiRequest($tokenURL, array(
          "grant_type" => "authorization_code",
          'client_id' => OAUTH2_CLIENT_ID,
          'client_secret' => OAUTH2_CLIENT_SECRET,
          'redirect_uri' => 'https://laconio.local/',
          'code' => get('code')
        ));
        $logout_token = $token->access_token;
        $_SESSION['access_token'] = $token->access_token;


        header('Location: ' . $_SERVER['PHP_SELF']);
      }

      if (session('access_token')) {
        $user = apiRequest($apiURLBase);

        echo '<h3>Logged In</h3>';
        echo '<h4>Welcome, ' . $user->username . '</h4>';
        echo '<pre>';
        echo '<p><a href="?action=logout">Log Out</a></p>';
        echo '</pre>';

      } else {
        echo '<h3>Not logged in</h3>';
        echo '<p><a href="?action=login">Log In</a></p>';
      }


      if (get('action') == 'logout') {
        // This should logout you
        logout($revokeURL, array(
          'token' => session('access_token'),
          'token_type_hint' => 'access_token',
          'client_id' => OAUTH2_CLIENT_ID,
          'client_secret' => OAUTH2_CLIENT_SECRET,
        ));
        unset($_SESSION['access_token']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        die();
      }

      function apiRequest($url, $post = FALSE, $headers = array())
      {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);


        if ($post)
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

        $headers[] = 'Accept: application/json';

        if (session('access_token'))
          $headers[] = 'Authorization: Bearer ' . session('access_token');

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        return json_decode($response);
      }

      function logout($url, $data = array())
      {
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
          CURLOPT_POST => TRUE,
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
          CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
          CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        $response = curl_exec($ch);
        return json_decode($response);
      }

      function get($key, $default = NULL)
      {
        return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
      }

      function session($key, $default = NULL)
      {
        return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
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