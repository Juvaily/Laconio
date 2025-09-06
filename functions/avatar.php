<?php 
function avatar($username, $avatar, $id){
        if ($avatar!=null) {
          $extention = is_animated($avatar);
          echo '<img id="ds" src="https://cdn.discordapp.com/avatars/' . $id . '/' . $avatar . $extention.'">';
        } else {
         echo '<img id="ds" src="https://cdn-icons-png.flaticon.com/512/3670/3670157.png" alt=' . $username . '/>';
        }
}
function is_animated($avatar)
{
	$ext = substr($avatar, 0, 2);
	if ($ext == "a_")
	{
		return ".gif";
	}
	else
	{
		return ".png";
	}
}