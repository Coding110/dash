<?php

/*	Tables 
 *	1.dash_URL_info			// 
 *	2.dash_accounts			// alipay account or bank account for reward
 *	3.dash_history			// Dashang history
 *	4.dash_transfer_records	// records of rewards transferring to users
 *	
 */
global $wpdb;
define('DASH_URL_INFO_TABLE',$wpdb->prefix.'dash_URL_info');
define('DASH_ACCOUNTS_TABLE',$wpdb->prefix.'dash_accounts');
define('DASH_HISTORY_TABLE',$wpdb->prefix.'dash_history');
define('DASH_TRANSFER_RECORDS_TABLE',$wpdb->prefix.'dash_transfer_records');
global $dash_db_version;
$dash_db_version = '1.0.0';

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
		default_money bigint DEFAULT 1 NOT NULL,
		dash_type varchar(8) NOT NULL, 
		dash_scene varchar(16) NOT NULL, 
		gen_time datetime DEFAULT '2015-02-01 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";
	dbDelta($sql);

	// Create a database table
	$table_name = DASH_HISTORY_TABLE;
	$sql = "CREATE TABLE $table_name (
		id bigint NOT NULL AUTO_INCREMENT,
		dash_id bigint NOT NULL,
		pay_trade_no varchar(16) NOT NULL, 
		pay_status int,
		dash_user varchar(128), 
		dash_money bigint,
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

/*	Select 
 *	
 *	
 */

/*	Insert 
 *	
 *	
 */
function dash_url_info_insert($data = array()){
	global $wpdb;

	$columns = dash_url_info_columns();
	$cur_time = current_time('timestamp');
	$data['gen_time'] = date_i18n( 'Y-m-d H:i:s', $cur_time, true );
	$data['user_id'] = get_current_user_id();
	
	$wpdb->insert(DASH_URL_INFO_TABLE, $data, $columns);
	return $wpdb->insert_id;
}

/*	Update 
 *	
 *	
 */

/*	Delete 
 *	
 *	
 */

