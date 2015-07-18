<?php

define("LOG_FILE", getcwd()."/var/log/ds.log");

function hexToStr($hex)
{
	return sprintf("%06x", $hex);
}

/* log alipay status */
//function dslog($msg, $tag = 'INFO')
function dslog($tag, $msg)
{
	date_default_timezone_set("PRC"); 
	$timestr = date('Y-m-d H:i:s', time());
	file_put_contents(LOG_FILE, "$timestr [$tag] $msg\n", FILE_APPEND | LOCK_EX);
}


