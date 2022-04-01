<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ( $_SESSION['cat']=="1" or $_SESSION['cat']=="5"  )){
include('connexion.php');
$num="";
$m="";
$message="";
$sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
// if(isset($_POST['ok'])){  
// if($_POST['type']!="")
// $_SESSION['recu']=$_POST['num_recu'];
// $serie=$_POST['serie'];
// $_SESSION['choix']=$_POST['type'];

//}
if(isset($_POST['submit'])){
    if($choix!=$_POST['type']){
        $choix="non ok";
    }
    $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_SESSION['recu']."'");
    $data=mysqli_fetch_array($req);
    //$_SESSION['nin']=$data['nin']; 
    $sexe=$_POST['sexe'];
    $email=$_POST['email'];
    $telm=$_POST['telm'];
    $telf=$_POST['telf'];
    $adresse=addslashes($_POST['adresse']);
    $nationalite=$_POST['nationalite'];
    $pays=$_POST['pays'];
    $situat =$_POST['situat'];
    $ile = $_POST['ile'];
    $nbre = $_POST['nbre'];
    $bp = $_POST['bp'];
if($_SESSION['choix']==5){
   $req =mysqli_query($link,"UPDATE candidats SET statut='2' where num_recu='".$_SESSION['recu']."'");
   if(mysqli_affected_rows($link)>0){
    $message="ok"; 
    unset($_SESSION['recu']);
        $date=date("Y-m-d
        H:i:s");
        if($_SESSION['cat']=="1"){
        $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
        }if($_SESSION['cat']=="3"){
            $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
        }if($_SESSION['cat']=="5"){
            $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
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
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }
        header('location:ficheTransferts.php');
    }
}else if($_SESSION['choix']==1)
 {
    $sql = "UPDATE candidats SET statut='2',pays='$pays',ile='$ile' ,tel_fix='$telf',situation ='$situat',Nbr_enfants='$nbre',adresse_cand='$adresse',mail='$email',bp='$bp',nationalite ='$nationalite' WHERE num_recu='".$_SESSION['recu']."' ";
   $req= mysqli_query($link,$sql);
   if(mysqli_affected_rows($link)>0){
    unset($_SESSION['recu']);
        $date=date("Y-m-d
        H:i:s");
        if($_SESSION['cat']=="1"){
        $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
        }if($_SESSION['cat']=="3"){
            $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
        }if($_SESSION['cat']=="5"){
            $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
        }
        
    header('location:fiche_preins.php');
}
}else if($_SESSION['choix']==2 OR $_SESSION['choix']==3)
{
    $sql = "UPDATE candidats SET statut='2',pays='$pays',ile='$ile' ,tel_fix='$telf',situation ='$situat',Nbr_enfants='$nbre',adresse_cand='$adresse',mail='$email',bp='$bp',nationalite ='$nationalite' WHERE num_recu='".$_SESSION['recu']."' ";
    $req= mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)>0){
        unset($_SESSION['recu']);
            $date=date("Y-m-d
            H:i:s");
            if($_SESSION['cat']=="1"){
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }
        header('location:fiche_preins.php');
}
 }else if($_SESSION['choix']==6 OR $_SESSION['choix']==7){
    
    $sql = "UPDATE candidats SET statut='2',pays='$pays',ile='$ile' ,tel_fix='$telf',situation ='$situat',Nbr_enfants='$nbre',adresse_cand='$adresse',mail='$email',bp='$bp',nationalite ='$nationalite' WHERE num_recu='".$_SESSION['recu']."' ";
    $req= mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)>0){
        unset($_SESSION['recu']);
            $date=date("Y-m-d
            H:i:s");
            if($_SESSION['cat']=="1"){
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','fiche Préinscription')");
            }
        header('location:master.php');
    }



}
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/css.css">
</head>
<body>
    <section class="main-wrapper">
        <aside class="left-aside">
            <div class="fontLogo"> 
                <div class="img-rd">
                    <img src="./assets/img/udc.png" alt="profile image">
                </div>
                <h6 class="m-3 text-center"><strong class="titre"> Université des Comores</strong></h6>
                <hr>
            </div>
            <nav class="nav-aside">
                <?php
                    switch($_SESSION['cat']){
                    case 1 :include('interfaces/superAdminRubrique.php'); break;
                    case 2 : include('interfaces/administrationRubrique.php');break;
                    case 3:include('interfaces/agtScolariteRubrique.php'); break;
                    case 4: include('interfaces/scolariteRubrique.php'); break;
                    case 5:include('interfaces/desRubrique.php'); break;
                    case 6: include('interfaces/gestionnaireRubrique.php'); break;
                    case 7:include('interfaces/agentComptaRubrique.php'); break;
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'))?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
				</div>
                <?php echo $message;?>
                <?php
                    if($_SESSION['choix']==1 or $_SESSION['choix']== 2 or $_SESSION['choix']==3 or $_SESSION['choix']==6 or $_SESSION['choix']==7){
                ?>
                        <h1 class="soft-title-1">Veuillez compléter ces informations </h1>
                         <hr />
           <?php
                if($num==0){
            ?>
                        <h6 style="color:red"> <?php echo $m ?></h6>
            <?php  } else{ ?>
                        <h6 style="color:green"> <?php echo $m ?></h6>
                        <?php   }
            ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="choixPreins.php" method="POST">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <select id="inputile" class="form-control" name="ile" required>
                                <option value="" hidden>Ile</option>
                                <option value="Ngazidja">Ngazidja</option>
                                <option value="Anjouan" >Anjouan</option>
                                <option value="Moheli" >Mohéli</option>
                                <option value="Mayotte" >Mayotte</option>
                                <option value="autre" >Autre</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <input name="pays" type="text" class="form-control" id="inputCountry"  placeholder="Pays" required>
                            </div>
                            </div>
                            <div class="form-group">
                            <input name="nationalite" type="text" class="form-control" id="inputNati"  placeholder="Nationalité"required >
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <select  class="form-control" name="situat" required>
                                    <option value="" hidden>Situation familiale</option>
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié(e)" >Marié(e)</option>
                                    <option value="Divorcé(e)" >Divorcé(e)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="nbre" required>
                                    <option value="" hidden>Nombre d'enfants</option>
                                    <option value="0" >0</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="plus que 6" >Plus que 6</option>
                                </select>
                            </div> 
                        </div>    
                        <div class="form-row">
                        <div class="form-group col-md-6">   
                            <input name="adresse" type="text" class="form-control"  placeholder="Adresse Actuelle" required>
                        </div>
                        <div class="form-group col-md-6">  
                            <input name="bp" type="text" class="form-control" id="inputbp"  placeholder="Boite postale" value="0">
                        </div>
    </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <input name="telf" type="text" class="form-control"  placeholder="Téléphone fixe" value="0">
                            </div>

                            <div class="form-group col-md-6">
                            <input name="email" type="text" class="form-control"  placeholder="Email" value="..............................@.............">
                        </div>
                        </div>
                      
                        <div class="text-right">
                        <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                    </form>
                </div>
            </div>
                   <?php }
                    ?>
                   
                    <?php
                    if($_SESSION['choix']==4){?>
                    <h1 class="soft-title-1"></h1>
                <hr /><div style="margin-bottom:80px"></div>
                <div class="row">
                <div class="col-12">
                    <form action="choixPreins.php" method="POST">
                        
                        
                            <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Continuer</button>
                       </div>
                       </form>
                   <?php }
                    ?>
                    <?php
                    if($_SESSION['choix']==5){?>
                        <h1 class="soft-title-1">Remplir ce champ <?php $message; ?> </h1>
                <hr /><div style="margin-bottom:80px"></div>
                <div class="row">
                <div class="col-12">
                    <form action="choixPreins.php" method="POST">
                    
                         <div class="form-row">
                         <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-4">
                            <input style="text-align:center;" name="telm" type="text" class="form-control"   placeholder="Téléphone mobile" required >
                            </div></div>
                    </div></div>
                            <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                       </form>
                   <?php }
                    ?>
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>
</html>