<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="5" )){
include('connexion.php');


$r="SELECT  date_fin FROM date_fin order by id_date DESC";
    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);

$message = "";
$req = mysqli_query($link,"SELECT * from candidats where  num_recu ='".$_SESSION['num_recu']."'");
$data = mysqli_fetch_array($req) ;
   $nin=$data['nin'];
   $sexe=$data['sexe'];
   $tel=$data['tel_mobile'];
   $nati=$data['nationalite'];
   $bp=$data['bp'];
   $nbrenb=$data['Nbr_enfants'];
   $telf=$data['tel_fix'];
    $mail=$data['mail'];
    $adre=$data['adresse_cand'];
    $pay=$data['pays'];
    $num =$data['num_recu'];
$reep=mysqli_query($link,"SELECT users.id_cat,libelle from users,categorie where users.id_cat=categorie.id_cat");
if(isset($_POST['modifier'])){
    $no=$_POST['telm'];
    $pre=$_POST['sexe'];
    $sql = "UPDATE candidats SET ile='".$_POST['ile']."',sexe='".$_POST['sexe']."',tel_fix='".$_POST['telf']."',bp='".$_POST['bp']."',adresse_cand='".$_POST['adresse']."',mail='".$_POST['email']."',nationalite='".$_POST['nationalite']."',pays='".$_POST['pays']."',situation='".$_POST['situat']."' where num_recu='".$num."'";
    $req=mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)){
       
        header('location:fiche_preins.php');
    } else{
       $message="Modification non faite!";
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
    <h4 align="right"><strong><?php  echo ucwords($_SESSION['prenom']." ".$_SESSION['nom'])?> </strong></h4>
    <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
    
    <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
    <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
    <h2 align="center" class="soft-title-2" style="color:black;">Modifier les informations  </h2>
                <hr />
            </div>
        <div class="text-center mb-5">
            </div>
                    
                                 <?php
                                    echo $message;
                                 ?>
                                        
                
                    
            </div>
            <form action="modifinmanq.php" method="POST">
            
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputile">Ile</label>
                            <select id="inputile" class="form-control" name="ile">
                                <option value="Ngazidja">Ngazidja</option>
                                <option value="Anjouan" selected>Anjouan</option>
                                <option value="Moheli" >Moheli</option>
                                <option value="Mayotte" >Mayotte</option>
                            </select>
                            </div>
         
                            <div class="form-group col-md-6">
                            <label for="inputCountry">Pays</label>
                            <input name="pays" type="text" class="form-control" id="inputCountry"  value="<?php echo $pay;?>" >
                            </div>
                            </div>
                            <div class="form-row">
                            <label for="inputNati">Nationalite</label>
                            <input name="nationalite" type="text" class="form-control" id="inputNati"  value="<?php echo $nati;?>" >
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputile">situation</label>
                            <select id="inputile" class="form-control" name="situat">
                                <option value="Celibataire" selected>celibataire</option>
                                <option value="Marié(e)" >Marié(e)</option>
                                <option value="Divorcé(e)" >Divorcé(e)</option>
                                    </select>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="inputnbre">Nombre d'enfants</label>
                            <input name="nbre" type="text" class="form-control" id="inputnbre" value="<?php echo $nbrenb;?>">
                            </div>
                            
                        </div>    
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Adresse Actuelle</label>
                            <input name="adresse" type="text" class="form-control" id="inputAddress"  value="<?php echo $adre;?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputbp">Boite postale</label>
                            <input name="bp" type="text" class="form-control" id="inputbp"  value="<?php echo $bp;?>">
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Telephone fixe</label>
                            <input name="telf" type="text" class="form-control" id="inputPassword4"  value="<?php echo $telf;?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input name="text" type="email" class="form-control" id="inputEmail4" value="<?php echo $mail;?>">
                            </div>
                         </div>
                            
                        
                         
                         
                            
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCountry">Sexe :</label>

<select id="inputsexe" class="form-control" name="sexe" required>
    <option value="F">Feminin</option>
    <option value="M" selected>Masculin</option>
</select>
            </div>
            
           
        <div class="form-group col-md-6">
        
        
                            </div>
                            
    
                
            
            </div>
             
    
        

       
        <div class="text-center">
            <input  type="submit" name="modifier" class="btn btn-primary" value="Mettre à jour">
            </div>
        
        
                
          
    </form>
    
            
               
        </main>
    </body>
</html>

       <?php

}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>