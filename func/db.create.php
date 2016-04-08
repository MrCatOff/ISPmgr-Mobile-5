<?php

if($isp->query( 'db.edit' ) === false)
{
	echo 'error';
} else {
	if(isset($_POST[':create']))
	{
		$time = time();
		if($isp->query( 'db.edit&sok=ok&remote_access=on&owner='.$isp->login.'&confirm='.urlencode($_POST['repassword']).'&password='.urlencode($_POST['password']).'&username='.urlencode($_POST['name']).'&name='.urlencode($_POST['name']).'&type=mysql&charset='.urlencode($_POST['encoding']).'&comment='.urlencode($_POST['comment'])) === false)
		{
			echo 'Error';
		} else {
			echo 'Confirm';
			
		}
	}
echo '<form method="POST">';
echo '<input type="text" name="name" placeholder="Пользователь / Название"><br />';
echo '<input type="password" name="password" placeholder="Пароль"><br />';
echo '<input type="password" name="repassword" placeholder="Повторите пароль"><br />';
echo 'Кодировка: <br /><select name="encoding">
	<option value="utf8">UTF-8</option>
	<option value="cp1250">CP1250</option>
	</select> <br />';
echo '<input type="text" name="comment" placeholder="Коментарий"><br />';
echo '<input type="submit" value="Создать" name=":create">';
echo '</form>';
}
echo '<div class=""><a href="?func=db"> Вернутся в меню управления MySQL</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';


