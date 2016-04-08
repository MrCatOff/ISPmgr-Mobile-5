<?php
echo '<div class="">Хост: ' . $isp->ip . ' || User: ' . $isp->login .'</div>';
echo '<a href="?func=domain"> <div class="">Управление доменами</div></a>';
echo '<a href="?func=db"> <div class="">Управление MySQL</div></a>';
echo '<a href="?func=cron"> <div class="">Управление Cron</div></a>';
echo '<a href="?func=webdomain"> <div class="">Управление WWW доменами</div></a>';
?>