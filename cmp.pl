#!/usr/bin/perl
use strict;
use warnings;
use feature qw/say/;

my $dir1="/var/www/html/wp/";
my $dir2="/home/admin/project/dash/";

my @objs = (
		[$dir1."static", $dir2."ds", "diff -r"],
		[$dir1."static", $dir2."ds", "Only"],
		[$dir1."wp-content/plugins/dashang/", $dir2."p/dashang", "diff -r"],
		[$dir1."wp-content/plugins/dashang/", $dir2."p/dashang", "Only"],
		[$dir1."wp-content/themes/dash", $dir2."t/dash", "diff -r"],
		[$dir1."wp-content/themes/dash", $dir2."t/dash", "Only"],
	);

for( my $i = 0; $i < @objs; $i++){
	my $cmd = "diff -r $objs[$i][0] $objs[$i][1] | grep \"$objs[$i][2]\"";
	#print "Command: $cmd\n";
	print `$cmd`;
}

