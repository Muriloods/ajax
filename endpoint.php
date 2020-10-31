<?php
	$headers = apache_request_headers();
	$data = array();

	if(isset($headers['Content-Type']))
	{
		if($headers['Content-Type'] == 'application/x-www-form-urlencoded; charset=UTF-8')
		{
			$data = is_array($_POST) ? $_POST : array();
		}
		else if ($headers['Content-Type'] == 'application/json')
		{
			$data = file_get_contents('php://input');
			$data = !empty($data) ? json_decode($data, true) : array();
		}
	}

	sleep(2);
	print_r($data);