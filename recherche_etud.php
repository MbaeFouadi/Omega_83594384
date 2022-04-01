<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="8")){
    include('connexion.php');
    $r="SELECT  date_fin FROM date_fin order by id_date DESC";
    $f="";
    $m="";
        $req = mysqli_query($link,$r);
        $dat=mysqli_fetch_array($req);
        $dateJ=date('Y-m-d');
    if(isset($_POST['submit'])){
        $matricule=$_POST['matricule'];
        $_SESSION['matricule']=$matricule;
        $query=mysqli_query($link,"SELECT * FROM etudiant WHERE mat_etud=$matricule") or die(mysqli_error($link));
        $data=mysqli_fetch_array($query);
        //$exi=mysqli_num_rows($query) or die(mysqli_error($link));
        if(mysqli_num_rows($query)>=1){
            $f=1;
        }

        else{
            $f=0;
            //header('location:recherche_etud.php');
            $m="Ce matricule n'existe pas";
        }
    }

    if(isset($_POST['sub'])){
        $nin=$_POST['NIN'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date_naiss=$_POST['date_naiss'];
        $lieu_naiss=$_POST['lieu_naiss'];
        $ad_etud=$_POST['Adr_Etud'];

        $req=mysqli_query($link,"UPDATE etudiant SET NIN='$nin', nom='$nom', prenom='$prenom', date_naiss='$date_naiss', lieu_naiss='$lieu_naiss', Adr_Etud= '$ad_etud' WHERE mat_etud='".$_SESSION['matricule']."'") or die(mysqli_error($link));
        header('location:recherche_etud.php');
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
                    case 8:include('interfaces/adminRubrique.php'); break;
                    
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
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <?php 
                if($f==0){?>
            <div class="text-center mb-5">
                    <h2 class="soft-title-2" style="color:#00b185;"> Recherche </h2>
                    <h5 style="color:red;"><?php echo $m ?></h5>
                    <hr /><div style="margin-bottom:80px"></div>
            </div>
                <div class="row">
                <div class="col-12">
            
                <form action="recherche_etud.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="matricule" class="form-control"  placeholder="Saisir le matricule" required> 
                        </div>   
                    </div>
                        <div class="text-center">
                        <button name="submit" type="submit"  class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                    </div>
                </div>
                <?php }elseif($f==1){?>
                        <div class="container">
                            <h1 style="color:#00b185; text-align:center">Modification</h1><br>
                            <form action="recherche_etud.php" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nin</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="NIN" value="<?=$data['NIN']?>">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nom</label>
                                        <input type="text" class="form-control" id="inputPassword4" name="nom" value="<?=$data['nom']?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Prenom</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="prenom" value="<?=$data['prenom']?>">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Date Naissance</label>
                                        <input type="text" class="form-control" id="inputPassword4" name="date_naiss" value="<?=$data['date_naiss']?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Lieu Naissance</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="lieu_naiss" value="<?=$data['lieu_naiss']?>">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Adresse Etudiant</label>
                                        <input type="text" class="form-control" id="inputPassword4" name="Adr_Etud" value="<?=$data['Adr_Etud']?>">
                                    </div>
                                </div>
                                <button type="submit" name="sub" class="btn btn-primary">Modifier</button>
                                <a class="btn btn-primary text-right" href="userInterface.php" role=button style="margin-left:80px;"> Annuler</a>
                            </form>
                        </div>
                    <?php }?>
                
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