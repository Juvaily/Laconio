  <header>
    <nav>
      <span class="brand">
        <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
      </span>
      <ul class="menu">
        <li class="button">
          <h2><a href="https://laconio.me/donate">Магазин</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://wiki.laconio.me">Wiki</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://laconio.me/rules">Правила</a></h2>
        </li>
        <li class="button">
          <h2><a href="https://map.laconio.me" target="_blank">Карта</a></h2>
        </li>
        <?php if (session('access_token')) {
          if (roles() == 'Теневое правительство') { ?>
            <li class="button">
              <h2><a href="https://map.laconio.me" target="_blank">Дашборд</a></h2>
            </li>
        <?php }
        } ?>
      </ul>
      <div class="menu-btn">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <span class="login">
        <?php include(__DIR__ . '\button.php'); ?>
      </span>
    </nav>
    <ul class="menu-vert">
      <li class="button">
        <?php include(__DIR__ . '\button.php'); ?>
      </li>
      <li class="button">
        <h2><a href="https://laconio.me/donate">Магазин</a></h2>
      </li>
      <li class="button">
        <h2><a href="https://wiki.laconio.me">Wiki</a></h2>
      </li>
      <li class="button">
        <h2><a href="https://laconio.me/rules">Правила</a></h2>
      </li>
      <li class="button">
        <h2><a href="https://map.laconio.me" target="_blank">Карта</a></h2>
      </li>
      <?php if (session('access_token')) {
        if (roles() == 'Теневое правительство') { ?>
          <li class="button">
            <h2><a href="https://map.laconio.me" target="_blank">Дашборд</a></h2>
          </li>
      <?php }
      } ?>
    </ul>
  </header>