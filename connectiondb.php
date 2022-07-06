<?php
    $serverName = "DESKTOP-VIE5VBT\SQLEXPRESS"; 
    $uid = "DESKTOP-VIE5VBT\Shubham Borhade";   
    $pwd = "";  
    $databaseName = "classes_quiz"; 
    //$connectionInfo = array( "UID"=>$uid, "PWD"=>$pwd, "Database"=>$databaseName); 
    $connectionInfo = array( "Database"=>"classesquiz"); 
    /* Connect using SQL Server Authentication. */  
    $conn = sqlsrv_connect($serverName, $connectionInfo);  
    if(!$conn)
    {
        echo "couldn't connect";
    }
    else
    {
        //echo "connected";
    }
?>