<?php

// we split the txt file to generate a nice array
$new_ary = array();
$txt = file_get_contents (REALPATH . "/data/dk/regionsopdelte_postnumre.txt");

// postals are on each line
$ary = explode ("\n", $txt);
unset($txt);

// create a array of arrays with each postal info in a array
foreach ($ary as $key => $val){
    $new_ary[] = explode (" ", $val);
}

unset ($ary);

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
    } else {
        $new_ary[$key] = array_values($val);
    }

}

$ary = array (); $i = 0;
foreach ($new_ary as $key => $val ){
    $ary[$i]['country']   = "Denmark";
    $ary[$i]['country_short']   = "dk";

    $ary[$i]['regioncode']      =   $val[0];
    $ary[$i]['regionname']      =   $val[2];
    $ary[$i]['municipcode']   = $val[3];
    $ary[$i]['municipname']   = $val[4];
    $ary[$i]['zipcode']   = $val[6];

    $num_elm = count ($val);
    if ($num_elm == 9){
        $ary[$i]['zipname']   = $val[7] . " " . $val[8];
    } else {
        $ary[$i]['zipname']   = $val[7];
    }
    $i++;
}



