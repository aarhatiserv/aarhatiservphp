<?php
// base url code

	if (isset($_SERVER['HTTP_HOST']))
	{
		$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
		$base_url .= '://'. $_SERVER['HTTP_HOST'];
		$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}
	else
	{
		$base_url = 'http://localhost/';
	}



?>