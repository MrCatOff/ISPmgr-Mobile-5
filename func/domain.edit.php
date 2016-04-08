<?php
if($isp->query(  ) === false)
{
	echo 'error';
} else {
if(isset($_POST[':create']))
{
if($isp->query( 'domain.edit&sok=ok&name='.urlencode($_POST['name']).'&ns='.urlencode($_POST['ns']) ) === false)
{
echo 'Провалено';
}else{
echo 'Успешно';
}
}

echo '<form method="POST">';
echo '<input type="text" name="name" placeholder="Доменое имя"><br />';
echo '<input type="text" name="ns" placeholder="Сервера имён"><br />';
echo '<input type="submit" value="Создать" name=":create">';
echo '</form>';
}
echo '<div class=""><a href="?func=domain"> Назад в домены</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';