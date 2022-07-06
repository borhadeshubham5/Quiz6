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
$q = $_GET['q'];
//print "value of q is $q";
$sql = "SELECT * FROM classdetails where courseid='$q';";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<b> Course Details</b><br><br>";
    echo "<table><tr><th>Course ID</th><th>Name</th><th>Days</th><th>Times</th><th>Capacity</th><th>Batch</th></tr>";
    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
    {
        $cid=$row['courseid'];
        $cname=$row['cname'];
        $cdays=$row['days'];
        $ctime=$row['times'];
        $ccap=$row['capacity'];
        $cbatch=$row['batch'];
        echo "<tr>";
        echo "<td>" . $cid . "</td>";
        echo "<td>" . $cname . "</td>";
        echo "<td>" . $cdays . "</td>";
        echo "<td>" . $ctime . "</td>";
        echo "<td>" . $ccap . "</td>";
        echo "<td>" . $cbatch . "</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
else
{
    echo "No data found.";
}
$sql = "SELECT * FROM classregistered where courseid='$q';";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<b><br> Student enrolled in the course.</b><br><br>";
    echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Student Name</th><th>Batch</th></tr>";
    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
    {
        $cid=$row['courseid'];
        $cname=$row['cname'];
        $sname=$row['sname'];
        $cbatch=$row['cbatch'];
        echo "<tr>";
        echo "<td>" . $cid . "</td>";
        echo "<td>" . $cname . "</td>";
        echo "<td>" . $sname . "</td>";
        echo "<td>" . $cbatch . "</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
else
{
    echo "<br><br>No students enrolled for this course.";
}
?>
</body>
</html>
