<?php

$elid = urlencode((string) $_GET['elid']);

if($isp->query( 'domain.record.edit&plid='.$elid ) === false)
{
	echo 'error';
} else {
if(empty($elid))
{
	echo 'Domain not found';
} else {
	
	$xml = $isp->query( 'domain.record.edit&plid='.$elid );
	
	echo '<div class="">Домен: '.$xml->plid.'</div>';
	echo '<div class="">TTL: '.$xml->ttl.'</div>';
	echo '<div class="">TIP: '.$xml->tips->tip.'</div>';
	echo '<div class="">RTYPE: '.$xml->rtype.'</div>';
}
}
echo '<div class=""><a href="?func=domain"> Назад в домены</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';