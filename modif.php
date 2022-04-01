<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);

$message = "";

$req = mysqli_query($link,"SELECT * from users where  id_users ='".$_GET['id']."'");
while($data = mysqli_fetch_array($req)){
    $id=$data['id_users'];
    $nom=$data['nom'];
    $prenom=$data['prenom'];
    $login=$data['login'];
    $statut = $data['statut'];
   
    
}
$reep=mysqli_query($link,"SELECT * from categorie ");

if(isset($_POST['modifier'])){
 
    $sql = " UPDATE users SET nom='".$_POST['nom']."',prenom='".$_POST['prenom']."',login='".$_POST['login']."',id_cat='".$_POST['libelle']."',statut='".$_POST['statut']."' where id_users='$id'";
    $message = " utilisataurs modifier";
	header('location:listeUtilisa.php');
	$req=mysqli_query($link,$sql) or die("erreur");
    
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
   
            </div>
        <div class="text-center mb-5">
            </div>
            <h3 style="margin-top:-50px;margin-bottom:50px"align="center">Modifier les informations concernant <strong><?php echo ucwords($nom." ".$prenom) ?></strong></h3>

            
                    <form action="modif.php?id=<?php echo $id;?>" method="POST">
         
                    
                    
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:200px;">Catégorie</h5></div>
                <div class="form-group col-md-4">
                    <select type="text" class="form-control" name="libelle" id="inputlib" placeholder="Categorie">
                    <?php while($data = mysqli_fetch_array($reep)) {?>
                        <option value="<?php echo $data['id_cat'];?>"><?php echo $data['libelle'];?></option>
                        <?php } ?>									
                    </select>    
                </div>                    
            </div>

            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:200px;">Nom</h5></div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nom" id="inputnom" value="<?php echo $nom;?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:200px;">Prénom</h5></div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="prenom" id="inputprenom" value="<?php echo $prenom;?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:200px;">Login</h5></div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="login" id="inputusern" value="<?php echo $login;?>">
                </div>
        
            </div>
									
									
                                       

                                    <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:200px;">Etat</h5></div>
                <div class="form-group col-md-4">
                <select type="text" class="form-control" name="statut" id="inputstatut">
                <option value="0" >desactiver</option>
                <option value="1" selected>activer</option>
                </select>                </div> 
            </div>

       
 
										
									<div class="text-center">
									<button type="submit" name="modifier" class="btn btn-primary">Enregistrer</button>
                                    </div>
								</form>
                                </body>
                                </html>
                                <?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>