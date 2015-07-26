#!/usr/bin/perl
use strict;
use warnings;
use feature qw/say/;

my $dir1="/data/www/dashang/";
my $dir2="/data/www/source/dash/";

my @objs = (
		[$dir1."static", $dir2."ds", "diff -r"],
		[$dir1."static", $dir2."ds", "Only in"],
		[$dir1."wp-content/plugins/dashang/", $dir2."p/dashang", "diff -r"],
		[$dir1."wp-content/plugins/dashang/", $dir2."p/dashang", "Only in"],
		[$dir1."wp-content/themes/dash", $dir2."t/dash", "diff -r"],
		[$dir1."wp-content/themes/dash", $dir2."t/dash", "Only in"],
	);

for( my $i = 0; $i < @objs; $i++){
	my $cmd = "diff -r $objs[$i][0] $objs[$i][1] | grep \"$objs[$i][2]\"";
	#my $cmd = "diff -r $objs[$i][0] $objs[$i][1]";
	#print "Command: $cmd\n";
	print `$cmd`;
}

