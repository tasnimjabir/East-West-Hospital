<?php
//SELECT sys_context('userenv','instance_name') FROM dual;
$conn = oci_connect("ewh", "admin", "localhost/XE");

if(!$conn){
    $e = oci_error();
    die("Connection failed: " . $e['message']);
}

function fetchData($sql){
    $stmt = oci_parse($GLOBALS['conn'], $sql);
    oci_execute($stmt);
    $data = [];    
    while(($row = oci_fetch_assoc($stmt)) !== false){
        $data[] = $row;
    }
    oci_free_statement($stmt);
    return $data;
}

function escape($value){
    return str_replace("'", "''", $value);
}

function executeSql($sql){
    $stmt = oci_parse($GLOBALS['conn'], $sql);
    $has_execute = oci_execute($stmt);
    oci_free_statement($stmt);
    }

session_start();

?>
