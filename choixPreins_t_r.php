<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ( $_SESSION['cat']=="1" or $_SESSION['cat']=="6"  or $_SESSION['cat']=="5" )){
include('connexion.php');
if($_SESSION['choix']==5){
   $req =mysqli_query($link,"UPDATE candidats SET statut='2' where num_recu='".$_SESSION['recu']."'");
   if(mysqli_affected_rows($link)>0){
    $message="ok"; 
    //unset($_SESSION['recu']);
        $date=date("Y-m-d
        H:i:s");
        if($_SESSION['cat']=="1"){
        $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche reprise')");
        }if($_SESSION['cat']=="3"){
            $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche reprise')");
        }if($_SESSION['cat']=="5"){
            $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche reprise')");
        }
        header('location:ficheReprise.php');
    }else{
        $message="not ok";
    }
}else if($_SESSION['choix']==4){
    $req =mysqli_query($link,"UPDATE candidats SET statut='2' where num_recu='".$_SESSION['recu']."'");
    if(mysqli_affected_rows($link)>0){
        unset($_SESSION['recu']);
            $date=date("Y-m-d
            H:i:s");
            if($_SESSION['cat']=="1"){
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche transfert')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche transfert')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche transfert')");
            }
        header('location:ficheTransferts.php');
    }
}

}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>