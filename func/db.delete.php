<?php

$elid = urlencode($_GET['elid']);
if($isp->query( 'db.delete&elid='.$elid) === false)
{
	echo 'error';
} else {
	echo 'Confirm';
}
