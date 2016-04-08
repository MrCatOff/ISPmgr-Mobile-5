<?php

if($isp->query( 'db' ) === false)
{
	echo 'error';
} else {
	echo '<div class=""><a href="?func=db.create">Создать базу данных</a></div>';
	
	foreach($isp->query( 'db' )->elem as $xml)
	{
        echo '<div><b>DataUsers:</b> '.$isp->query( 'db.users&elid='.$xml->key )->elem->name.'</div>';
		echo '<div><b>DataBase:</b> '.$xml->name.'</div>';
		echo '<div><b>Size:</b> '.$xml->size.'</div>';
		echo '<div><b>Comment:</b> '.$xml->comment.'</div>';
		echo '<div><b>Host:</b> '.$xml->dbhost.'</div>';
		echo '<div><a href="?func=db.delete&amp;elid='.$xml->key.'"> Delete</a></div>';
	}
}
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';