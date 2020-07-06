<?php
    session_start();

    $mysqli=new mysqli('localhost','root','','the-perfect-cup');
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query= "select * from members where email='$email'";
    $result=mysqli_query($mysqli,$query) or die(mysqli_error());
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>=1)
    {
        if(password_verify($password,$row['password']))
        {
            $_SESSION['login']=$row['id'];
            $_SESSION['fname']=$row['fname'];
            $_SESSION['lname']=$row['lname'];
            echo "true";
        }
        else
            echo "false";
    }
    else
        echo "false";

?>