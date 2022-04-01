<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and $_SESSION['cat']=="1"){


include('connexion.php');

$r="SELECT  date_fin FROM date_fin order by id_date DESC";
$req = mysqli_query($link,$r);
$dat=mysqli_fetch_array($req);
$mes = "";

/* Ajout d'une nouvel libellé*/
if(isset($_POST['valider'])){ 
	$annee = $_POST['annee'];
	//Insertion de la nouvelle catégorie "Ncat"
	$query = "INSERT INTO annee(Annee) VALUES('$annee')";
    $reque=mysqli_query($link,$query) or die('Erreur Sql!');
    if(isset($mes)){
    $mes ="Nouvelle année enregistré ";
    }
    else
    {
        $mes ="Nouvelle année non enregistré ";
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
							<h1 align="center" style="margin-bottom:20px"> Ajout d'une nouvelle année</h1>
							<?php ?>
								<h5 align="center" style="color:green"><?php 
								//Afficher que le champs est bien enregistré
								if (isset($mes)){ echo $mes; }?></h5>
							<?php ?>
						
							
						<!--Début du formulaire d'ajout d'une nouvelle catrégorie-->
							<form action="" method="POST">
									
									<div class="form-group">
											<!--Ajout d'une nouvelle catégorie-->
											<input type="text" class="form-control" name="annee" id="inputnom" placeholder="Exemple: 2020-2021" required>
										</div>
									
										
									<div class="text-center">
									<button type="submit" name="valider" class="btn btn-primary">Enregistrer</button>
									</div>
								</form>
						<!--Fin de l'ajout d'une nouvelle catégorie-->
						
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

