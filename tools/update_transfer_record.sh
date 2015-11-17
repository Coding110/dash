#!/bin/sh

if [ $# -ne 6 ]; then
	echo "Usage: $0 <user> <password> <database> <uid> <account> <money>"
	exit
fi

rate=0.05
current_time=`date +'%Y-%m-%d %H:%M:%S'`

user=$1
passwd=$2
dbname=$3
uid=$4
account=$5
money=$6

function update_record()
{
	sql="insert into wp_dash_transfer_records (user_id, account_name, transfer_rate, transfer_money, transfer_time) values (${uid}, '${account}', ${rate}, ${money}, '${current_time}');"
	echo ${sql}
	echo ${sql} | mysql -u${user} -p${passwd} ${dbname}
}

update_record

