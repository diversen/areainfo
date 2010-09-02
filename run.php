#!/usr/bin/php
<?php

define ('DEBUG' , 1);
define ('REALPATH', realpath('.'));

$ini_file = REALPATH . "/config/config.ini";

if (!file_exists($ini_file)){
    die ("No ini file found: $ini_file. Create it and define database settings and language.\n");
} else {
    $ini = parse_ini_file ($ini_file);
}

include_once REALPATH . "/lib/db2.php";

$db = new db2($ini['url'], $ini['username'], $ini['password']);
$db->connect($ini['url'], $ini['username'], $ini['password']);
foreach ($ini['country'] as $key => $val){
    include REALPATH . "/scripts/$val/get_country_info.php";
    foreach ($ary as $in_key => $in_val){
        $db->insert($ini['db_table'], $in_val);
    }
}

