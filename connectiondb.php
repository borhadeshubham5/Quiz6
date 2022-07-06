<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:cse6331ssb.database.windows.net,1433; Database = cse6331ssb", "ssb4235", "2996Shubh@");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "ssb4235", "pwd" => "2996Shubh@", "Database" => "cse6331ssb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:cse6331ssb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
