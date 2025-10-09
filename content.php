<?php
include(__DIR__.'\oauth.php');
include(__DIR__.'\functions\avatar.php');
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
  <?php  include(__DIR__ . '\components\header.php'); ?> 
    <section class="container-dashboard">
        <form action="" method="post" class="signin">
          <label>Заголовок</label>
           <table width="100%">
            <tr>
              <td>
                <input type="checkbox" name="">
              </td>
              <td>
                <a href="">First article`s title</a>
              </td>
              <td>
                 23.02.2022
              </td>
              <td>
                <a href="">Редактировать</a>
              </td>
              <td>

              </td>
            </tr>
           </table>
        </form>
    </section>
  <?php  include(__DIR__ . '\components\footer.php'); ?> 

</body>

</html>

