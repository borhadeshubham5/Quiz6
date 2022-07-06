<?php session_start(); ?>
<html>
    <head>
        <link rel='stylesheet' href='../style.css'>
        <script>
        function showClasses() 
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() 
            {
                if (this.readyState==4 && this.status==200) 
                {
                    document.getElementById("classdet").innerHTML=this.responseText;
                }
                
            }
            xmlhttp.open("GET","showallclass.php",true);
            xmlhttp.send();
        }
</script>
    </head>
    <body onload="showClasses()">
        <center><h2>Shubham Subhash Borhade | 1001994235 | CSE6331 Advanced Database Systems | Quiz 6</h2></center><br>
        <?php 
            //session_start();
            $fname=$_SESSION["fname"];
            echo "<center>Welcome! $fname | <a href='logout.php'>Logout</a></center><br>";
        ?>
        <center>
<br>
<div id="classdet"></div></center>
    </body>
</html>
