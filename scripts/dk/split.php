#!/usr/bin/php
<?php

// we split the txt file to generate a nice array
$new_ary = array();
$txt = file_get_contents ("../data/regionsopdelte_postnumre.txt");

// postals are on each line
$ary = explode ("\n", $txt);

// create a array of arrays with each postal info in a array
foreach ($ary as $key => $val){
    $new_ary[] = explode (" ", $val);
}

// remove empty values.
foreach ($new_ary as $key => $val ){
    foreach ($val as $in_key => $in_val){
        if (trim($in_val) == ""){
            unset($val[$in_key]);
        }
    }
    $new_ary[$key] = $val;
}

// remove any elements of new_ary which is not an area
foreach ($new_ary as $key => $val){
    (int)$num_elm = count($val);
    if ($num_elm > 9 OR $num_elm < 8 ){
        unset($new_ary[$key]);
    }
}

