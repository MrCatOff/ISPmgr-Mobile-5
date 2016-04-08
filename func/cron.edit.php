<?php
/* Анти баг, Сначала удаляем старый потом создаём новый! */
$elid = urlencode($_GET['elid']);
if($isp->query( 'scheduler.edit' ) === false)
{
  echo 'error';
} else {
  if(isset($_POST[':create']))
    {   
    if($isp->query( 'scheduler.edit&sok=ok&elid='.$elid.'&schedule_type=type_expert&input_hour='.urlencode($_POST['input_hour']).'&input_min='.urlencode($_POST['input_min']).'&input_dmonth='.urlencode($_POST['input_dmonth']).'&input_month='.urlencode($_POST['input_month']).'&input_dweek='.urlencode($_POST['input_dweek']).'&mailto='.urlencode($_POST['mailto']).'&command='.urlencode($_POST['command']).'&description='.urlencode($_POST['description']) ) === false)
    {
      echo 'Error';
    } else {
      echo 'Success';
      echo '<div class=""><a href="?func=cron"> Вернутся в Cron</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';
      exit();
    }             
    }
  $xml = $isp->query( 'scheduler&elid='.$elid )->elem;
  $interval = explode(' ', $xml->interval);
  
  echo '<form method="POST">';
  echo '<input type="text" name="mailto" placeholder="E-Mail" value="'.$xml->mailto.'" /><br />';  
  echo '<input type="text" name="command" placeholder="Команда" value="'.$xml->command.'" /><br />'; 
  echo '<input type="text" name="description" placeholder="Описание" value="'.$xml->description.'" /><br />'; 
  echo '<input type="text" name="input_min" placeholder="Минуты выполнения" value="'.$interval[0].'" /><br />'; 
  echo '<input type="text" name="input_hour" placeholder="Часы выполнения" value="'.$interval[1].'"/><br />';
  echo '<input type="text" name="input_dmonth" placeholder="Дни месяца" value="'.$interval[2].'"/><br />'; 
  echo '<input type="text" name="input_month" placeholder="Месяц" value="'.$interval[3].'" /><br />';
  echo '<input type="text" name="input_dweek" placeholder="Дни недели" value="'.$interval[4].'"/><br />'; 
  echo '<input type="submit" name=":create" value="Создать" />';
  echo '</form>'; 
}
echo '<div class=""><a href="?func=cron"> Вернутся в Cron</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';