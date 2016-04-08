<?php
/* POST -> ERROR -> ARRAY */
$i = (int) 1;
foreach($_POST as $get) {
$delete_error[$i] = $get;
$i++;
}
$why_del = (string) "";
for((int) $i = 1; $i < count($delete_error) + 1; $i++)
{
  $why_del .= $delete_error[$i];
  if($i != count($delete_error)) 
  {
    $why_del .= ', ';
  }   
}
echo urlencode($why_del);
/* GET CODE */
if($isp->query( 'webdomain.error.delete&elid='.urlencode($why_del).'&plid='.urlencode($_POST['name']) ) === false)
{
	echo 'error';
} else {
  echo 'Succes';
}
echo '<div class=""><a href="?func=webdomain"> Управление WWW доменами</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';
?>