<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include_once "../connectiondb.php";
session_start();
$sname=$_GET['q'];
$sql = "SELECT * FROM classregistered where sname='$sname';";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<b><br>Student $sname is enrolled in following classes:<b><br><br>";
    echo "<table><tr><th>Course ID</th><th>Name</th><th>Batch</th></tr>";
    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
    {
        $cid=$row['courseid'];
        $cname=$row['cname'];
        $cbatch=$row['cbatch'];
        echo "<tr>";
        echo "<td>" . $cid . "</td>";
        echo "<td>" . $cname . "</td>";
        echo "<td>" . $cbatch . "</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
else
{
    echo "$sname is not enrolled in any classes.";
}
?>
</body>
</html>