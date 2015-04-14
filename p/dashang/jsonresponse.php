<?php

function json_response($error, $info)
{
	$arr = array('err' => $error, 'info' => $info);
	return json_encode($arr);
}
