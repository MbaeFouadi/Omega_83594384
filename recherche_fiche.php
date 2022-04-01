<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1"  or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){  
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";
$s="";
$m="";
    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
if(isset($_POST['re'])){
    if(!empty($_POST['recu'])){
        $recu=$_POST['recu'];
        $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
        if(mysqli_num_rows($req)>0){
           $data= mysqli_fetch_array($req);
           $_SESSION['nin'] =$data['nin'];
           $mat=$_SESSION['matricule'];
           $type=$data['id_type'] ;
            if($data['statut']>=2){
            
                if($data['id_type']==4){
                    header('Location:ficheTransferts.php');
                }
                else if($data['id_type']==5){
                    header('Location:ficheReprise.php');
                }else if($data['id_type']==6 or $data['id_type']==7){
                    header('Location:master.php');
                }else if($data['id_type']==1){
                    header('Location:fiche_preins.php');
                }else if($data['id_type']==2 OR $data['id_type']==3){
                    header('Location:fiche_preins.php');
                }
            }else if($data['statut']==1){
                $m="Cette personne a un reçu mais n'a pas encore  une fiche!";
                 }
             else{
                $m="Cette fiche n'existe pas!";
            }
        }else{
            $m = "Ce reçu n'existe pas";
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
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
                
                
                    <h2 class="soft-title-2" style="color:black;">Rechercher une fiche </h2>
                    <hr /><div style="margin-bottom:80px"></div>
                    <?php
                if($s==0){?>
            </div>
            <h4 align="center" style="color:red;margin-bottom:20px"><?php echo $m ?></h4>
       
                <div class="row">
                <div class="col-12">
            
                <form action="recherche_fiche.php" method="post">
                       
            
            
                        <div class="form-row">
                        <div class="form-group col-md-4"></div>
                           <div class="form-group col-md-4">
                                <input style="text-align:center;" type="text" name="recu" class="form-control"  placeholder="Saisir le Numéro de reçu">
                            </div>

                            
                        </div>
                </div></div>
                          
                     
                        <div class="text-center">
                        <button name="re" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                </div>
                </div>

                       
               
              <?php 
              
           
                ?>
         
           
              <?php 
              
            }
                ?>

                
        </main>

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