<?php
$elid = htmlspecialchars($_GET['elid']);

if($isp->query( 'domain.delete&webdomain=on&maildomain=on&elid='.$elid ) === false)
{
	echo 'error';
} else {
if(empty($elid))
{
echo 'error domain';
}else{

if($isp->query( 'domain.delete&webdomain=on&maildomain=on&elid='.$elid ) === false)
{
echo 'Ошибка удаления.';
} else {
echo 'Успешно удалено.';
}
}
}
echo '<div class=""><a href="?func=domain"> Назад в домены</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';