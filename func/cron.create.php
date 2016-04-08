<?php

if($isp->query( 'scheduler.edit' ) === false)
{
  echo 'error';
} else {
  if(isset($_POST[':create']))
    {
    if($isp->query( 'scheduler.edit&sok=ok&schedule_type=type_expert&input_hour='.urlencode($_POST['input_hour']).'&input_min='.urlencode($_POST['input_min']).'&input_dmonth='.urlencode($_POST['input_dmonth']).'&input_month='.urlencode($_POST['input_month']).'&input_dweek='.urlencode($_POST['input_dweek']).'&mailto='.urlencode($_POST['mailto']).'&command='.urlencode($_POST['command']).'&description='.urlencode($_POST['description']) ) === false)
    {
      echo 'Error';
    } else {
      echo 'Success';
    }
    }
  //echo var_dump($isp->query( 'scheduler.edit'));
  echo '<form method="POST">';
  echo '<input type="text" name="mailto" placeholder="E-Mail" /><br />';
  echo '<input type="text" name="command" placeholder="Команда" /><br />'; 
  echo '<input type="text" name="description" placeholder="Описание" /><br />'; 
  echo '<input type="text" name="input_min" placeholder="Минуты выполнения" /><br />'; 
  echo '<input type="text" name="input_hour" placeholder="Часы выполнения" /><br />';
  echo '<input type="text" name="input_dmonth" placeholder="Дни месяца" /><br />'; 
  echo '<input type="text" name="input_month" placeholder="Месяц" /><br />';
  echo '<input type="text" name="input_dweek" placeholder="Дни недели" /><br />'; 
  echo '<input type="submit" name=":create" value="Создать" />';
  echo '</form>';   
}
echo '<div class=""><a href="?func=cron"> Вернутся в Cron</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';