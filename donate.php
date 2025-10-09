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
  <?php  include(__DIR__ . '\components\header.php'); ?> 


  <h3>Подписки</h3>
  <?php
  include(__DIR__ . '\kits\lite.php');
  include(__DIR__ . '\kits\pro.php');
  include(__DIR__ . '\kits\full.php');
  ?>
  <h3>Обычные наборы</h3>
  <?php
  include(__DIR__ . '\kits\mount.php');
  include(__DIR__ . '\kits\miner.php');
  include(__DIR__ . '\kits\blacksmith.php');
  include(__DIR__ . '\kits\hunter.php');
  include(__DIR__ . '\kits\mount2.php');
  include(__DIR__ . '\kits\chemistry.php');
  include(__DIR__ . '\kits\wizard.php');
  include(__DIR__ . '\kits\farmer.php');
  include(__DIR__ . '\kits\engineer.php');
  include(__DIR__ . '\kits\warrior.php');
  ?>
  <h3>Строительные Наборы</h3>
  <?php
  include(__DIR__ . '\kits\wood.php');
  include(__DIR__ . '\kits\sand.php');
  include(__DIR__ . '\kits\ground.php');
  include(__DIR__ . '\kits\flowers.php');
  include(__DIR__ . '\kits\nether2.php');
  include(__DIR__ . '\kits\wool.php');
  include(__DIR__ . '\kits\ice.php');
  include(__DIR__ . '\kits\concrete.php');
  include(__DIR__ . '\kits\light.php');
  include(__DIR__ . '\kits\prismarine.php');
  include(__DIR__ . '\kits\bricks.php');
  include(__DIR__ . '\kits\nether1.php');
  include(__DIR__ . '\kits\quartz.php');
  include(__DIR__ . '\kits\end.php');
  include(__DIR__ . '\components\footer.php'); ?> 
</body>
<script src="../functions/script.js"></script>