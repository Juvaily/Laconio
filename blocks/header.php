<header>
  <nav>
    <span class="brand">
      <a href="https://laconio.me/"><img class="logo" src="images/Загогулина.svg"></a>
    </span>
    <ul class="menu">
      <li class="button">
        <div class="slide"></div><a href="https://laconio.tebex.io/">Магазин</a>
      </li>
      <li class="button">
        <div class="slide"></div><a href="https://laconio.me/rules">Правила</a>
      </li>
      <li class="button">
        <div class="slide"></div><a href="https://laconio.me/rules">Wiki</a>
      </li>
      <li class="button">
        <div class="slide"></div><a href="https://map.laconio.me" target="_blank">Карта</a>
      </li>
      <?php
      if (session('access_token')) {
        $user = apiRequest($apiURLBase);
        //if (in_array( '1006980355523354655',$_SESSION['guilds']['roles'])) //теневое правительство
        // {
        //   echo ('Welcome, admin');
        // }
        // else{

        echo '<li class ="button" id="avatar"><a>' . $user->username .'</a>';
        avatar($user->username,$user->avatar, $user->id);
        echo '</li>';
        

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

    </ul>
  </nav>


  </div>
</header>