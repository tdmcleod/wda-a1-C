<?php

function connect() {

    $pdo = new PDO("mysql:host=yallara.cs.rmit.edu.au;dbname=winestore;port=59443", "td_mcleod", "blowfish1") or die("Could not connect");
    return $pdo;
}

function get_regions() {
    $conn = connect();
    $results = array();
    
    $sql = "SELECT * FROM region";
    $res = array();
    foreach ($conn->query($sql) as $row) {
        $str="<option value='";
        if ($row['region_name'] == 'All') {
            $str.= '';
        } else {
            $str.= $row['region_name'];
        }

       $str.= "'>" . $row['region_name'] . "</option>";
       array_push($res, $str);
    }
    
    return $res;
}

function get_variety() {
    $conn = connect();
    $results = array();
    
    $sql = "SELECT * FROM grape_variety";
    foreach ($conn->query($sql) as $row) {
        $res= "<option value='" . $row['variety'] . "'>" . $row['variety'] . "</option>";
        array_push($results, $res);
    }
    
    return $results;
}

function get_years() {

    $conn = connect();
    $results = array();
    
    $sql = "SELECT MAX(year) FROM wine";
    $val = $conn->query($sql)->fetch();


    $max = $val[0];

    $sql = "SELECT MIN(year) FROM wine";
    $val = $conn->query($sql)->fetch();

    $min = $val[0];

    for ($i = $min; $i <= $max; $i++) {

        $res="<option value\"$i\" >$i</option>";
        array_push($results,$res);
    }
    
    return $results;
}

?>
