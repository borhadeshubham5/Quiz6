<?php session_start(); ?>
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
$sname=$_SESSION['fname'];
$sql = "SELECT * FROM classdetails;";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<b>Available Courses!<b><br><br>";
    echo "<table><tr><th>Course ID</th><th>Name</th><th>Days</th><th>Times</th><th>Capacity</th><th>Batch</th><th>Enroll</th></tr>";
    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
    {
        $cid=$row['courseid'];
        $cname=$row['cname'];
        $cdays=$row['days'];
        $ctime=$row['times'];
        $ccap=$row['capacity'];
        $cbatch=$row['batch'];
        $clid=$row['classid'];
        echo "<tr>";
        echo "<td>" . $cid . "</td>";
        echo "<td>" . $cname . "</td>";
        echo "<td>" . $cdays . "</td>";
        echo "<td>" . $ctime . "</td>";
        echo "<td>" . $ccap . "</td>";
        echo "<td>" . $cbatch . "</td>";
        if($ccap==0)
        {
            echo "<td>Class if full.</td>";
        }
        else
        {
            echo "<td> <a href='enroll.php?cid=$clid'>Enroll</a> </td>";
        }
        
        echo "</tr>";
        
    }
    echo "</table>";
}
else
{
    echo "No data found.";
}
$sql = "SELECT * FROM classregistered where sname='$sname';";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<b><br>Courses which you're enrolled in!<b><br><br>";
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
    echo "No data found.";
}
?>
</body>
</html>
