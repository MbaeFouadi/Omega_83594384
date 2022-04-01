<?php
    session_start();
   
    include('connexion.php');
    
    $date=date("Y-m-d H:i:s");
    mysqli_query($link,"UPDATE users SET connecte = 0 where login ='".$_SESSION['login']."'");
   // if(mysqli_affected_rows($link)>0){
        if($_SESSION['cat']=="1"){
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="2"){
                $log=mysqli_query($link,"INSERT INTO log_admin_c (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="4"){
                $log=mysqli_query($link,"INSERT INTO log_scola (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="6"){
                $log=mysqli_query($link,"INSERT INTO log_gestion (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }if($_SESSION['cat']=="7"){
                $log=mysqli_query($link,"INSERT INTO log_agentcompta (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Deconnexion')");
            }
            mysqli_query($link,"UPDATE users SET connecte = 0 where login ='".$_SESSION['login']."'");
            //echo "UPDATE users SET connecte = 0 where login ='".$_SESSION['login']."'";
          
           session_unset();
           session_destroy();
           header('Location:index.php');
           exit();
       
?>

