
<?php
$username = 'local';
$password = '123';
$servername = 'MySQL-8.0';
try{
// Check connection
$conn = new PDO("mysql:host=$servername;info_news", $username, $password);
// set the PDO error mode to exception
$pdo_options = [
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

}
catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
   }
?>