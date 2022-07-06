<?php session_start(); ?>
<html>
    <head>
        <link rel='stylesheet' href='../style.css'>
        <script>
        function showClasses(str) 
        {
        if (str=="") 
        {
            document.getElementById("classdet").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) 
            {
                document.getElementById("classdet").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getclass.php?q="+str,true);
        xmlhttp.send();
        }
        function showEnrollment(str) 
        {
        if (str=="") 
        {
            document.getElementById("classdet").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) 
            {
                document.getElementById("classdet").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getenrollment.php?q="+str,true);
        xmlhttp.send();
        }
</script>
    </head>
    <body>
        <center><h2>Shubham Subhash Borhade | 1001994235 | CSE6331 Advanced Database Systems | Quiz 6</h2></center><br>
        <?php 
            //session_start();
            $fname=$_SESSION["fname"];
            echo "<center>Welcome! $fname | <a href='logout.php'>Logout</a></center><br>";
        ?>
        <center>
    <div>
        <h2>Search for class details</h2>
        <form method="post">
        <h3>Class Number</h3>
        <input type="text" id="classid" name="classid" placeholder="Eg: CSE 6331" onchange="showClasses(this.value)">
  </form>
  <form method="post">
        <h2>Search for student enrollment details</h2>
        <h3>Student Name</h3>
        <input type="text" id="sname" name="sname" placeholder="Eg: Shubham" onchange="showEnrollment(this.value)">
  </form>
</div>
<br>
<div id="classdet"></div></center>
    </body>
</html>
