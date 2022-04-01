<?php
include('connexion.php');
if(isset($_GET['id'])){
  
    $sql = 'DELETE FROM users WHERE id_users="'.$_GET['id'].'"';
    $requete = mysqli_query($link,$sql) or die("erreur".mysqli_error($link));
    mysqli_close($link);
    header('Location:listeUtilisa.php');
    
    }
    exit();
    ?>
?>