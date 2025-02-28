<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

define('OAUTH2_CLIENT_ID', '1337889537355153551');
define('OAUTH2_CLIENT_SECRET', 'D0-kdGzAJOYxq9OiZxvS-CagDwqqr59Y');

$authorizeURL = 'https://discord.com/api/oauth2/authorize';
$tokenURL = 'https://discord.com/api/oauth2/token';
$apiURLBase = 'https://discord.com/api/users/@me';
$revokeURL = 'https://discord.com/api/oauth2/token/revoke';

session_start();

// Start the login process by sending the user to Discord's authorization page
if (get('action') == 'login') {

  $params = array(
    'client_id' => '1337889537355153551',
    'redirect_uri' => 'https://laconio.local',
    'response_type' => 'code'
  );

  // Redirect the user to Discord's authorization page
  header('Location: https://discord.com/oauth2/authorize?client_id=1337889537355153551&response_type=code&redirect_uri=https%3A%2F%2Flaconio.local&scope=identify+guilds');
  die();
}
//


// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if (get('code')) {

  // Exchange the auth code for a token
  $token = apiRequest($tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => '1337889537355153551',
    'client_secret' => 'D0-kdGzAJOYxq9OiZxvS-CagDwqqr59Y',
    'redirect_uri' => 'https://laconio.local',
    'code' => get('code'),
    'scope' => 'identify%20guids',
  ));



  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;
  
  $_SESSION['guilds'] = get_guild();

  header('Location: ' . $_SERVER['PHP_SELF']);
}




if (get('action') == 'logout') {
  // This should logout you
  logout($revokeURL, array(
    'token' => session('access_token'),
    'token_type_hint' => 'access_token',
    'client_id' => '1337889537355153551',
    'client_secret' => 'OD0-kdGzAJOYxq9OiZxvS-CagDwqqr59Y',
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
function getGroup() {}
function get($key, $default = NULL)
{
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default = NULL)
{
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
function get_guild()
{
    $url = "https://discord.com/api/users/@me/guilds/551700336864264192/member";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL            => $url,
        CURLOPT_HTTPHEADER     => array('Authorization: Bearer ' . session('access_token')),
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_VERBOSE        => 1,
        CURLOPT_SSL_VERIFYPEER => 0,
    ));
    $response = curl_exec($ch);
    curl_close($ch); 
    $results = json_decode($response, true);
    return $results;
}

