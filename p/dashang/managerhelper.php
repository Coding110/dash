<?php

/*
 *	Process for user managerment 
 */

include_once( dirname( __FILE__ ) . '/dashdata.php' );

function manager_test()
{
	echo "<h3>Manager Test</h3>";
	echo "User id: ".get_current_user_id()."<br>";
	$data = array();
	//$data = dash_url_info_columns();
	$data['key'] = "100100";
	$data['user_id'] = get_current_user_id();
	print_r($data);
	$id = dash_url_info_insert($data);
	echo "insert id: ".$id;
}
