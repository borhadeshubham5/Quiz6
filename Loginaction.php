<?php
 session_start();
    $frole=$_POST["role"];
    if(isset($_POST['sname']))
    {
        $fname=$_POST["sname"];
        $_SESSION["fname"]=$fname;
        $_SESSION["frole"]=$frole;
        if($frole=='Teacher')
        {
            header("Location: teacher/index.php");
        }
        else
        {
            header("Location: student/index.php");
        }
    }
    else
    {
        header("Location: error.php");
    }
    

    
?>