#!/bin/sh

if [ $# -ne 4 ]; then
	echo "Usage: $0 <user> <password> <database> <date>"
	exit
fi

user=$1
passwd=$2
dbname=$3
start_date=$4
interval=10

function query()
{
	sub1="select dash_id, dash_money, dash_time from wp_dash_history where pay_status = 1 and dash_time > '${start_date}' and dash_time < DATE_ADD('${start_date}', INTERVAL ${interval} MONTH)"
	sub2="select t2.user_id as uid, t1.dash_id as did, t1.dash_money as money, t1.dash_time as time from (${sub1}) as t1 inner join wp_dash_URL_info as t2 on t1.dash_id = t2.id"
	sub4="select uid, sum(money) as money from (${sub2}) as t3 group by t3.uid";
	sql="select t4.uid as uid, t4.money as money, t5.account_type as type, t5.account as account from (${sub4}) as t4 inner join wp_dash_accounts as t5 on t4.uid = t5.user_id"
	echo ${sql} | mysql -u${user} -p${passwd} ${dbname}
}

query

