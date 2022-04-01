<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){
include('connexion.php');

$s="0";
$trouve=true;
if(isset($_POST['submit'])){
    //$mat=$_POST['matricule'];
    unset( $_SESSION['nin']);
    $_SESSION['nin']=$_POST['nin'];
    $req=mysqli_query($link,"SELECT * FROM etudiant WHERE NIN='".$_SESSION['nin']."'");
    $data=mysqli_fetch_array($req);
    if(mysqli_num_rows($req)==0){
        $message="Aucun etudiant n'est enregistré avec ce NIN";
        $trouve=false;
    }
    $s="1";
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']." ".$trouve; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
            </div>

           
            <?php
                    if($s==0){ ?>

<h2 align="center" class="soft-title-2" style="color:#00b185;">Rechercher un matricule</h2>
                <hr />

                <form action="recherch_mat.php" method="post">
                <div class="form-row">
                <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4">
                                
                                <input style="text-align:center;margin-top:40px;" type="text" name="nin" class="form-control"  placeholder="Saisir son NIN ">
                            </div>

                            
                        </div>
                        </div></div>
                            
                          
                     
                        <div class="text-center">
                        <input  type="submit" name="submit" class="btn btn-primary" value="rechercher">
                        </div>
                    </form>
            </div>
            
                </div>
            </div>
        </main>

                  <?php  } else {
                  if( $trouve==true ){ ?>

                    <div class="row">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h5>MATRICULE:&nbsp;&nbsp;&nbsp; &nbsp;<b><? echo $data['mat_etud']?></b></h5>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 style='margin-left:-90px,margin-right:20px'>NIN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $data['NIN'] ?></b></h5>
                            </div>
    
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><? echo utf8_encode($data['nom']) ;?></b></h5>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 style='margin-left:0px'>Pr&eacute;nom :&nbsp;&nbsp;<b><? echo utf8_encode($data['prenom']);?></b></h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h5>Date de naissance : <b><? echo $data['date_naiss']  ;?></b></h5>
                            </div>
                            <div class="form-group col-md-6">
                                <h5>Lieu de naissance :&nbsp;&nbsp;<b><? echo utf8_encode($data['lieu_naiss']);?></b></h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h5>&nbsp; &nbsp;&nbsp;</h5>
                            </div>
                            <div class="form-group col-md-6">
                                <h5>&nbsp;&nbsp;</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                  }else{
                     ?>
                        <h5 style="color:red;margin-bottom:200px" align= "center"><?php echo $message ?></h5>

                 <?php }
                ?>

            <div class="row">
                <div class="col-12">
                    <div class="mt-2 text-right">
                        <a href="recherch_mat.php" class="btn btn-primary btn-sm"><i class="icon-magnifier"></i> Rechercher un autre matricule </a>
                    </div>
                </div>
            </div>

                    <?php  }
            ?>
                

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>