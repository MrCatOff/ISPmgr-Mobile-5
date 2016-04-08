<?php
$plid = (string) $_GET['plid'];
if($isp->query( 'webdomain.error.edit&plid='.$plid ) === false)
{
	echo 'error';
} else {
  if(isset($_POST[':create']))
  {
    if($isp->query( 'webdomain.error.edit&plid='.$plid.'&sok=ok&code='.urlencode($_POST['code']).'&uri='.urlencode($_POST['uri']) ) === false)
     {
       echo 'Error'; 
     } else {
       echo 'Succesfull';
     }  
  } 
  
  echo '<form method="POST">';
  echo '<div><select name="code">';
  echo '<option value="401">401 - Unauthorized</option>';
  echo '<option value="402">402 - Payment Required</option>';
  echo '<option value="403">403 - Forbidden</option>';
  echo '<option value="404">404 - Not Found</option>';
  echo '<option value="405">405 - Method Not Allowed</option>';
  echo '<option value="406">406 - Not Acceptable</option>';
  echo '<option value="407">407 - Proxy Authentication Required</option>';
  echo '<option value="408">408 - Request Timeout</option>';
  echo '<option value="409">409 - Conflict</option>';
  echo '<option value="411">411 - Length Required</option>';
  echo '<option value="412">412 - Precondition Failed</option>';
  echo '<option value="413">413 - Request Entity Too Large</option>';
  echo '<option value="414">414 - Request-URI Too Long</option>';
  echo '<option value="415">415 - Unsupported Media Type</option>';
  echo '<option value="416">416 - Requested Range Not Satisfiable</option>';
  echo '<option value="417">417 - Expectation Failed</option>';
  echo '<option value="500">500 - Internal Server Error</option>';
  echo '<option value="501">501 - Not Implemented</option>';
  echo '<option value="502">502 - Bad Gateway</option>';
  echo '<option value="503">503 - Service Unavailable</option>';
  echo '<option value="504">504 - Gateway Timeout</option>';
  echo '<option value="505">505 - HTTP Version Not Supported</option>';
  echo '</select></div>';
  echo '<div><input type="text" name="uri" placeholder="Ссылка"></div>';
  echo '<div><input type="submit" value="Создать" name=":create"></div>';
  echo '</form>'; 
}
echo '<div class=""><a href="?func=webdomain"> Управление WWW доменами</a></div>';
echo '<div class=""><a href="?func=index"> Вернутся в меню</a></div>';
?>