<?php
if($isp->query( 'webdomain' ) === false)
{
	echo 'error';
} else {
  echo '<div class=""><a href="?func=webdomain.create">Создать WWW домен</a></div>';
  foreach($isp->query( 'webdomain' )->elem as $xml)
	 {
      echo '<div><b>Name:</b> '.$xml->name.'</div>';
      echo '<div><b>Document Root:</b> '.$xml->docroot.'</div>';
      echo '<div><b>IP:</b> '.$xml->ipaddr.'</div>';
      echo '<div><b>PHP Mode:</b> '.$xml->php_mode.'</div>';
      /* ERROR */
      if(!empty($isp->query( 'webdomain.error&elid='.urlencode($xml->name) )->elem))
      {
      echo '<hr />';
      echo '<table><tbody><th>[Уд.]</th><th>Code</th><th>URI</th></tbody>';
      echo '<form action="?func=webdomain.error.delete" method="POST">';
      echo '<input type="text" name="name" value="'.$xml->name.'" hidden>';
      foreach($isp->query( 'webdomain.error&elid='.urlencode($xml->name) )->elem as $error)
      {
      echo '<tr>';
        echo '<td><input type="checkbox" value="'.$error->code.'" name="'.$error->code.'"></td>';
        echo '<td>'.$error->code.'</td>';
        echo '<td>'.$error->uri.'</td>';
        echo '<td><a href="">[Ред]</a></td>';
      echo '</tr>';  
      }
      echo '</table>';
      echo '<div><input type="submit" value="Удалить"></div>';
      echo '</form>';
      echo '<hr />';  
      }
      echo '<div><a href="?func=webdomain.error.add&plid='.urlencode($xml->name).'">Добавить ошибку</a></div>';
      echo '<div><a href="?func=webdomain.edit">Редактировать</a></div>';
      echo '<div><a href="">Удалить</a></div>';
   }
}
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';
?>