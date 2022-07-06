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
//session_start();
$scid=$_GET["cid"];
$sname=$_SESSION["fname"];
$sql = "SELECT * FROM classregistered where cid=$scid and sname='$sname';";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    echo "<script type=\"text/javascript\">
            alert(\"You have already enrolled for this course.\");
            window.location = \"index.php\"
        </script>"; 
}
else
{
$sql = "SELECT * FROM classdetails where classid=$scid;";
$result=sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    $row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
    $cid=$row['courseid'];
    $cname=$row['cname'];
    $cbatch=$row['batch'];
    $clid=$row['classid'];
    $ccap=$row['capacity'];
    $sql = "insert into classregistered(cid, sname, cname, cbatch, courseid) values($clid,'$sname','$cname',$cbatch,'$cid')";
    $result=sqlsrv_query($conn, $sql);
    if(!isset($result))
    {
        echo "<script type=\"text/javascript\">
        alert(\"Couldn't enroll, check error logs.\");
        window.location = \"index.php\"
        </script>"; 
    }
    else 
    {
        $ccap=$ccap-1;
        $sql = "update classdetails set capacity=$ccap where classid=$clid;";
        $result=sqlsrv_query($conn, $sql);
        echo "<script type=\"text/javascript\">
        alert(\"Enrollment Successful $sname!\");
        window.location = \"index.php\"
        </script>"; 
    }            
}
else
{
    echo "No data found.";
}
}

?>
</body>
</html>
