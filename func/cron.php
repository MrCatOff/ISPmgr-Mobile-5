<?php
if($isp->query( 'scheduler' ) === false)
{
	echo 'error';
} else {
echo '<div class=""><a href="?func=cron.create">Создать Cron</a></div>';
foreach($isp->query( 'scheduler' )->elem as $xml)
  {


    echo '<div class="">Команда: '.$xml->command.'</div>';
    echo '<div class="">Период: '.$xml->interval.'</div>';
    echo '<div class="">Расписание: '.$xml->schedule_type.'</div>';
    echo '<div class="">Описание: '.$xml->description.'</div>';
    echo '<div class=""><a href="?func=cron.edit&amp;elid='.urlencode($xml->key).'">Редактировать</a></div>';
    echo '<div class=""><a href="?func=cron.delete&amp;elid='.$xml->key.'">Удалить</a></div>';
    echo '<div class="">-------------------------</div>';

  }
}
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';