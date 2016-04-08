<?php

if($isp->query( 'domain' ) === false)
{
	echo 'error';
} else {
	echo '<a href="?func=domain.edit"><div class="">Новый домен</div></a>';
	$xml = $isp->query('domain');
	foreach($xml->elem as $var)
	{
		echo '<div class=""> <b> Domain:</b> ' . htmlentities((string)$var->displayname, ENT_QUOTES, 'UTF-8') .'</div>';
		
		echo '<div class=""><a href="?func=domain.record.edit&amp;elid=' . urlencode((string)$var->displayname) . '">Просмотреть записи</a></div>';
		
		echo '<div class=""><a href="?func=domain.delete.request&amp;elid=' . urlencode((string)$var->displayname) . '">Удалить</a></div>';
	}
}
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';