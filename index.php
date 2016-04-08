<?php

session_start();

class ISPmgr
{
	/* 
	@String
	*/
	public $login = null;
	/*
	@String
	*/
	public $password = null;
	/*
	@string
	*/
	public $ip = null;
	/*
	@String
	*/
	public $port = null;
	/*
	@String
	*/
	public $url = null;
  /*
	@String
	*/
	public $session = null;
	
	public function __construct($login = null, $password = null, $ip = null, $port = 1500, $session = null)
	{
		$this->login = $login;
		$this->password = $password;
		$this->ip = $ip;
		$this->port = $port;
    $this->session = $session;
    if($session == null)
		$this->url = 'https://' . $this->ip . ':' . $this->port . '/ispmgr?authinfo=' . $this->login . ':' . $this->password . '&out=xml';
    else 
    $this->url = 'https://' . $this->ip . ':' . $this->port . '/ispmgr?auth='.$this->session.'&out=xml';
	} 
	
	public function query($params = null)
	{
		$url = $this->url;
		if($params != null) 
		{
			$url .= '&func=' . $params;
		}
       
		@$get = file_get_contents($url);
		if(trim($get) == 'access deny')
		{
			header('location: ?error');
		}
		$xml = simplexml_load_string($get);
		if(isset($xml->error))
		{
			return false;
		} else { 
			return $xml;
		}
	}
}


if( isset($_GET['error']))
{
	$_SESSION['isp_login'] = null;
	$_SESSION['isp_pass'] = null;
  $_SESSION['isp_sid'] = null;
	echo 'Ошибка авторизации';
}

	if(isset($_POST['submit']))
	{
		$_SESSION['isp_login'] = $_POST['isp_login'];
		$_SESSION['isp_pass'] = $_POST['isp_pass'];
		$isp = new ISPmgr( htmlspecialchars($_SESSION['isp_login']), htmlspecialchars($_SESSION['isp_pass']), '31.184.194.11', 1500, htmlspecialchars($_SESSION['isp_sid']));
	
		if($isp->query( 'auth' ) === false) 
		{
			echo 'Error';
			$_SESSION['isp_login'] = null;
	    $_SESSION['isp_pass'] = null;	
      $_SESSION['isp_sid'] = null;		
		} else {
      echo 'Success';
      $xml = $isp->query( 'auth' );
      $_SESSION['isp_sid'] = (string)$xml->auth;
		}
		
	}



if( isset($_SESSION['isp_login']) && isset($_SESSION['isp_pass']) )
{

	$isp = new ISPmgr( htmlspecialchars($_SESSION['isp_login']), htmlspecialchars($_SESSION['isp_pass']), '31.184.194.11', 1500, htmlspecialchars($_SESSION['isp_sid']) );

if (file_exists('./func/' . htmlspecialchars($_GET['func']) . '.php')) {
    require('./func/' . htmlspecialchars($_GET['func']) . '.php');
} else {
echo $isp->url;
        require ('func/index.php');
    }
} else {

	      echo '<font color = "black"><form action="?" method="post">';
        echo 'Логин:<br />';
        echo '<input name="isp_login" type="username" /><br />';
        echo 'Пароль:<br />';
        echo '<input name="isp_pass" type="password" /><br />';
        echo '<input name="submit" type="submit" value="Войти" />';
        echo '</form></font></br>';
}