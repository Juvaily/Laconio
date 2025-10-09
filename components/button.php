      <?php
      if (session('access_token')) {
        $user = apiRequest($apiURLBase);
        if (roles() == 'user') //теневое правительство
        {
          echo '<span class="login-menu"><h2 class ="button" id="avatar"><a>' . $user->username . '</a>';
          avatar($user->username, $user->avatar, $user->id);
          echo '</h2>';
          echo '<div if="login"><a href="?action=logout">Выйти</a>
        </div></span>';
        } else if (roles() == 'Теневое правительство') {

          echo '<span class="login-menu"><h2 class ="button" id="avatar"><a>' . $user->username . '</a>';
          avatar($user->username, $user->avatar, $user->id);
          echo '</h2>';
          echo '<div><a href="?action=logout">Выйти</a>
        </div></span>';
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