<?php

/*	Tables 
 *	1.dash_URL_info			// 
 *	2.dash_accounts			// alipay account or bank account for reward
 *	3.dash_history			// Dashang history
 *	4.dash_transfer_records	// records of rewards transferring to users
 *	
 */

include_once( dirname( __FILE__ ) . '/jsonresponse.php' );
include_once( dirname( __FILE__ ) . '/common.php' );

global $wpdb;
define('DASH_URL_INFO_TABLE',$wpdb->prefix.'dash_URL_info');
define('DASH_ACCOUNTS_TABLE',$wpdb->prefix.'dash_accounts');
define('DASH_HISTORY_TABLE',$wpdb->prefix.'dash_history');
define('DASH_TRANSFER_RECORDS_TABLE',$wpdb->prefix.'dash_transfer_records');
define('DASH_SITES_TABLE',$wpdb->prefix.'dash_sites');
global $dash_db_version;
$dash_db_version = '1.0.0';
define('DASH_KEY_BASE', 0x878680); // dash_key = $dash_key_start + id(id in the same db table)
global $dash_key_base;
$dash_key_base = 0x878680;

/*
 *	Pay status
 *	0 - new payment, 1 - pay success, 2 - pay failed
 */
define('DS_PAY_NEW', 0);
define('DS_PAY_SUCCESS', 1);
define('DS_PAY_FAILED', 2);

/*
 *	@key:			key in the Dashang URL, stored as digital and used as hex string at least 6 char(zeros filled if less than 6 char)
 *	@user_id:		user id
 *	@account_id:	account id in table dash_accounts
 *	@dash_amount:	default amount of rewarding
 *	@dash_type:		reward type: 1).'site', user need to add code into their website; 2).'text', users only paste some link for rewarding where they want;
 *	@dash_scene:	reward scene: website, weixin, weibo, blog, shuoshou/pengyouquan and so on. 
 *	@gen_time:		generate time of reward url
 */

function dash_tables_init(){
	global $wpdb;
	global $dash_db_version;

	//error_log("[dashang] tables init");

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	$charset_collate = $wpdb->get_charset_collate();

	// Create a database table
	$table_name = DASH_ACCOUNTS_TABLE;
	$sql = "CREATE TABLE $table_name (
		id int NOT NULL AUTO_INCREMENT,
		user_id int NOT NULL,
		account_type varchar(16),
		account varchar(64),
		account_name varchar(128),
		phone_no varchar(16),
		UNIQUE KEY id (id)
	) $charset_collate;";
	dbDelta($sql);

	// Create a database table
	$table_name = DASH_URL_INFO_TABLE;
	$sql = "CREATE TABLE $table_name (
		id bigint NOT NULL AUTO_INCREMENT,
		dash_key varchar(16) NOT NULL, 
		user_id bigint(20) unsigned NOT NULL,
		account_id int NOT NULL,
		default_money double DEFAULT 1 NOT NULL,
		dash_type varchar(8) NOT NULL, 
		dash_scene varchar(16) NOT NULL, 
		gen_time datetime DEFAULT '2015-02-01 00:00:00' NOT NULL,
		UNIQUE KEY id (id),
		UNIQUE KEY dash_key (dash_key)
	) $charset_collate;";
	dbDelta($sql);

	// Create a database table
	// pay status: 0 - new payment, 1 - pay success, 2 - pay failed
	$table_name = DASH_HISTORY_TABLE;
	$sql = "CREATE TABLE $table_name (
		id bigint NOT NULL AUTO_INCREMENT,
		dash_id bigint NOT NULL,
		pay_trade_no varchar(16) NOT NULL, 
		pay_status int,
		dash_user varchar(128), 
		dash_money double,
		dash_time datetime,
		dash_referer text, 
		UNIQUE KEY id (id)
	) $charset_collate;";
	dbDelta($sql);

	// Create a database table
	$table_name = DASH_TRANSFER_RECORDS_TABLE;
	$sql = "CREATE TABLE $table_name (
		id bigint NOT NULL AUTO_INCREMENT,
		user_id bigint(20) unsigned NOT NULL,
		account_name varchar(128),
		transfer_rate float,
		transfer_money bigint,
		transfer_time datetime,
		UNIQUE KEY id (id)
	) $charset_collate;";
	dbDelta($sql);

	// Create a database table
	$table_name = DASH_SITES_TABLE;
	$sql = "CREATE TABLE $table_name (
		id bigint NOT NULL AUTO_INCREMENT,
		user_id bigint(20) unsigned NOT NULL,
		site char(255) UNIQUE,
		add_time datetime,
		UNIQUE KEY id (id)
	) $charset_collate;";
	dbDelta($sql);

	// (don't know how to work with procedure in wordpress, replace by LOCK mechanism)
	// Create a procedure for creaing dashang URL info 
	// Call it with write lock
	//$sql = "DELIMITER // 
	//		CREATE PROCEDURE create_dash_url_info ('uid' bigint(20) unsigned,'account_id' int(11),default_money double,dash_type varchar(8),dash_scene varchar(16))
	//		BEGIN 
	//			START TRANSACTION;
	//			insert into ".DASH_URL_INFO_TABLE." (user_id,account_id,default_money,dash_type,dash_scene,gen_time)
	//			values (uid,account_id,default_money,dash_type,dash_scene,now());
	//			update ".DASH_URL_INFO_TABLE." set dash_key = HEX(".DASH_KEY_BASE." + LAST_INSERT_ID()) where id = LAST_INSERT_ID();
	//			COMMIT;
	//		END;//
	//		DELIMITER;";
	//error_log($sql);
	//#$ret = dbDelta($sql);
	//$wpdb->query($sql);
}

function dash_url_info_columns(){
	return array(
		'key' => '%d',
		'user_id' => '%d',
		'account_id' => '%d',
		'dash_amount' => '%d',
		'dash_type' => '%s',
		'dash_scene' => '%s',
		'gen_time' => '%s',
	);
}

/* Dashang URL Manager */

function dash_url_info_insert($data = array()){
	global $wpdb;

	$columns = dash_url_info_columns();
	$cur_time = current_time('timestamp');
	$data['gen_time'] = date_i18n( 'Y-m-d H:i:s', $cur_time, true );
	$data['user_id'] = get_current_user_id();
	
	$wpdb->insert(DASH_URL_INFO_TABLE, $data, $columns);
	return $wpdb->insert_id;
}

function generate_dash_key_json($user_id, $site, $fee)
{
	// check if site or fee is empty in javascript
	if($user_id == 0 || !isset($fee) || empty($fee)){
		echo json_response(1, "Eorror, invalid argument (1)");
		return NULL;
	}

	// check if $fee is double
	if(!is_numeric($fee)){
		echo json_response(1, "Eorror, invalid argument (2)");
		return NULL;
	}
	$fee_float = floatval($fee);
	$type = "web";
	if(!isset($site) || empty($site)){
		$type = "post";
	}
	if($type == "web"){
		$scene = "dommain";
	}else if($type == "post"){
	}else{
		echo json_response(1, "Eorror, invalid argument (3)");
		return NULL;
	}

	// test
	//$key = "9896fe";
	//return $key;

	global $wpdb;

	// find if the the current user had a key with the same $fee (improve later with checking $site or $post)
	$sql = "select dash_key from ".DASH_URL_INFO_TABLE." where user_id = ".$user_id." and default_money = ".$fee." and dash_type = '".$type."';";
	$key = $wpdb->get_col($sql);
	if(!empty($key)){
		return $key[0];
	}

	// create a key if not found
	$wpdb->query("LOCK TABLES ".DASH_URL_INFO_TABLE." WRITE");
	$ret = $wpdb->insert(
				DASH_URL_INFO_TABLE,
				array(
					'user_id' => $user_id,
					'default_money' => $fee_float,
					'dash_type' => $type,
					'dash_scene' => $scene,
					'gen_time' => current_time('mysql')
				),
				array(
					'%d','%f', '%s', '%s', '%s'
				)
	);
	if($ret == false){
		$wpdb->query("UNLOCK TABLES");
		return NULL;
	} 
	$id = $wpdb->insert_id;
	global $dash_key_base;
	$key_id = $id + $dash_key_base;
	$key = hexToStr($key_id);
	//echo "id:".$id.", key:".$key.", keyid:".$key_id.", base:".$dash_key_base."\n";
	$wpdb->update(
			DASH_URL_INFO_TABLE,
			array(
				'dash_key' => $key
			),
			array(
				'id' => $id,
			),
			array(
				'%s'
			),
			array(
				'%d'
			)
	);
	
	$wpdb->query("UNLOCK TABLES");

	return $key;
}

function generate_dash_key($user_id, $site, $fee)
{
	// check if site or fee is empty in javascript
	if($user_id == 0 || !isset($fee) || empty($fee)){
		return NULL;
	}

	// check if $fee is double
	if(!is_numeric($fee)){
		return NULL;
	}
	$fee_float = floatval($fee);
	$type = "web";
	if(!isset($site) || empty($site)){
		$type = "post";
	}
	if($type == "web"){
	}else if($type == "post"){
		$scene = "dommain";
	}else{
		return NULL;
	}

	// test
	//$key = "9896fe";
	//return $key;

	global $wpdb;

	// find if the the current user had a key with the same $fee (improve later with checking $site )
	$sql = "select dash_key from ".DASH_URL_INFO_TABLE." where user_id = ".$user_id." and default_money = ".$fee.";";
	$key = $wpdb->get_col($sql);
	if(!empty($key)){
		return $key[0];
	}

	// create a key if not found
	$wpdb->query("LOCK TABLES ".DASH_URL_INFO_TABLE." WRITE");
	$ret = $wpdb->insert(
				DASH_URL_INFO_TABLE,
				array(
					'user_id' => $user_id,
					'default_money' => $fee_float,
					'dash_type' => $type,
					'dash_scene' => $scene,
					'gen_time' => current_time('mysql')
				),
				array(
					'%d','%f', '%s', '%s', '%s'
				)
	);
	if($ret == false){
		$wpdb->query("UNLOCK TABLES");
		return NULL;
	} 
	$id = $wpdb->insert_id;
	global $dash_key_base;
	$key_id = $id + $dash_key_base;
	$key = hexToStr($key_id);
	//echo "id:".$id.", key:".$key.", keyid:".$key_id.", base:".$dash_key_base."\n";
	$wpdb->update(
			DASH_URL_INFO_TABLE,
			array(
				'dash_key' => $key
			),
			array(
				'id' => $id,
			),
			array(
				'%s'
			),
			array(
				'%d'
			)
	);
	
	$wpdb->query("UNLOCK TABLES");

	return $key;
}

function get_dash_url($key)
{
	if(!isset($key) || empty($key)) return NULL;
	$url = "http://www.dashangcloud.com/sh/".$key; // had better define the prefix as a variable
	return $url;
}

/*
 *	return $info = ("id", "user_id", "default_money")
 */
function get_base_info_for_dash($key)
{
	global $wpdb;
	$sql = "select id, user_id, default_money from ".DASH_URL_INFO_TABLE." where dash_key = '".$key."';";
	$info = $wpdb->get_row($sql);
	return $info;
}

/*	Dashang Transfer Manager */

/*	New transfer
 *	
 */

/*	Dashang History Manager */

/*	New history
 *	$record = ("dash_id", "dash_money", "referer")
 */
function new_dash_record($user_id, $record)
{
	global $wpdb;
	$ret = $wpdb->insert(
			DASH_HISTORY_TABLE,
			array(
				'dash_id' => $record['dash_id'],
				'pay_trade_no' => $record['dash_id'],
				'pay_status' => DS_PAY_NEW,
				'dash_money' => $record['dash_money'],
				'dash_time' => current_time('mysql'),
				'dash_referer' => $record['referer']
			),
			array(
				'%d', '%d', '%d', '%f', '%s', '%s'
			)
	);
	if($ret != 1){
		error_log("create new history record failed, user id[".$user_id."], fee[".$record['dash_money'].", ds id[".$record["dash_id"]."], referer[".$record["referer"]."]");
		return false;
	}
	$id = $wpdb->insert_id;
	return $id;
}

function update_dash_record($user_id, $record)
{
	global $wpdb;
}

/*	Query history
 *	
 */


/*	User Acount Manager 
 *
 *	only one acount for one user
 */

/*	Add Acount Info
 *	
 *	Need more code to ensure the $account_info's correctness in future.	
 */
function add_dash_acount_info($user_id, $account_info)
{
	if(!isset($user_id) || empty($user_id) || !isset($account_info) || empty($account_info) || $user_id < 1){
		echo json_response(1, "Too little information");
		return ;
	}
	global $wpdb;
	$id = $wpdb->insert(
				DASH_ACCOUNTS_TABLE,
				array(
					'user_id' => $user_id,
					'account_type' => $account_info['account_type'],
					'account' => $account_info['account'],
					'account_name' => $account_info['account_name'],
					'phone_no' => $account_info['phone_no'],
				),
				array(
					'%d','%s','%s','%s','%s'
				)
	);

	if(!isset($id) || empty($id)){
		return false;
	}else{
		return true;
	} 
}
/*
 *	Need more code to ensure the $account_info's correctness in future.	
 */
function update_dash_acount_info($user_id, $account_info)
{
	if(!isset($user_id) || empty($user_id) || !isset($account_info) || empty($account_info) || $user_id < 1){
		//echo json_response(1, "Too little information");
		return false;
	}
	global $wpdb;
	$ret = $wpdb->update(
			DASH_ACCOUNTS_TABLE,
			array(
				'account_type' => $account_info['account_type'],
				'account' => $account_info['account'],
				'account_name' => $account_info['account_name'],
				'phone_no' => $account_info['phone_no'],
			),
			array(
				'user_id' => $user_id,
			),
			array(
				'%s','%s','%s','%s'
			),
			array(
				'%d'
			)
	);
	if($ret == false){
		//echo json_response(1, $wpdb->last_error/*"database error"*/);
		return false;
	}else{
		return true;
	} 
}

/*	Get Acount Info
 *	
 */
function get_dash_acount_info($user_id)
{
	global $wpdb;
	$sql = "select account, account_name, phone_no from ".DASH_ACCOUNTS_TABLE." where user_id = ".$user_id.";";
	//var_dump($sql);
	$info = $wpdb->get_row($sql);
	//var_dump($info);
	return $info;
}

/*	Modify Acount Info
 *	
 */
function modify_dash_acount_info($user_id, $account_info)
{
	global $wpdb;
	$ret = false;
	$sql = "select id from ".DASH_ACCOUNTS_TABLE." where user_id = ".$user_id." order by id asc;";
	$info = $wpdb->get_col($sql);
	//var_dump($info);
	if(count($info) == 0){
		// create 
		$ret = add_dash_acount_info($user_id, $account_info);
	}else{
		// update
		$ret = update_dash_acount_info($user_id, $account_info);
	}
	if($ret == true){
		echo json_response(0, $account_info);
	}else{
		if(empty($wpdb->last_error)){
			echo json_response(0, $account_info);
		}else{
			echo json_response(1, "database error");
		}
	}
}


/* Dashang Sites Manager */

/*	Get sites by user id
 *	
 */
function get_sites_by_user_id($user_id)
{
	if(!isset($user_id) || empty($user_id)) return ;
	global $wpdb;
	$sql = "select site from ".DASH_SITES_TABLE." where user_id = ".$user_id." order by site asc;";
	$sites = $wpdb->get_col($sql);
	return $sites;
}

function add_dash_site($user_id, $site)
{
	if(!isset($user_id) || empty($user_id) || !isset($site) || empty($site) || $user_id < 1){
		echo json_response(1, "Too little information");
		return ;
	}
	global $wpdb;
	$id = $wpdb->insert(
				DASH_SITES_TABLE,
				array(
					'user_id' => $user_id,
					'site' => $site,
					'add_time' => current_time('mysql')
				),
				array(
					'%d','%s','%s'
				)
	);

	if(!isset($id) || empty($id)){
		$resp = json_response(1, $wpdb->last_error);
	}else{
		$resp = json_response(0, "OK");
	} 
	echo $resp;
}


function get_dash_code($key, $size, $fee) // $size: 2,3,4
{
	$dcode = "<div name=\"dashmain\" id=\"dash-main-id-".$key."\" class=\"dash-main-".$size." ".$key."-".$fee."\"></div>";
	$scode = "<script type=\"text/javascript\" charset=\"utf-8\" src=\"http://www.dashangcloud.com/static/ds.js\"></script>";
	return $dcode.$scode;
}

function generate_dash_code($user_id, $dash_key, $fee)
{
	if(!isset($dash_key) || empty($dash_key)){
		$info = "Eorror, site or fee can't be empty.";
		$resp = json_response(1, $info);
		echo $resp;
		return ;
	}
 
	$dash_url = get_dash_url($dash_key);
	$info = array(
				'ds_url' => $dash_url, 
				's16' => get_dash_code($dash_key, 4, $fee),
				's32' => get_dash_code($dash_key, 3, $fee), 
				's64' => get_dash_code($dash_key, 2, $fee) 
	);
	$resp = json_response(0, $info);
	echo $resp;
}

function generate_link_code($user_id, $dash_key, $fee)
{
	if(!isset($dash_key) || empty($dash_key)){
		$info = "Eorror, site or fee can't be empty.";
		$resp = json_response(1, $info);
		echo $resp;
		return ;
	}
	$dash_url = get_dash_url($dash_key);
	$info = array(
				'ds_url' => $dash_url, 
	);
	$resp = json_response(0, $info);
	echo $resp;
}

/*
 *	$type: web, post, all, null
 */
function get_links_by_type($user_id, $type)
{
	if(!isset($user_id) || empty($user_id)) return ;
	global $wpdb;
	if(!isset($type) || $type == '' || $type == "all"){
		$sql = "select dash_key, default_money from ".DASH_URL_INFO_TABLE." where user_id = ".$user_id.";";
	}else{
		$sql = "select dash_key, default_money from ".DASH_URL_INFO_TABLE." where user_id = ".$user_id." and dash_type = '".$type."';";
	}
	//error_log("[dashang] ".$sql);
	$links = $wpdb->get_results($sql);
	//var_dump($links);
	return $links;
}
