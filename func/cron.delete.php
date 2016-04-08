<?php
$elid = urlencode($_GET['elid']);
if($isp->query( 'scheduler.delete&elid='.$elid ) === false)
{
	echo 'error';
} else {
  echo 'Success';
}
echo '<div class=""><a href="?func=cron"> Вернутся в Cron</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';